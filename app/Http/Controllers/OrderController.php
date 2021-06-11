<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orderInfo($id,$mail){
        $data = [];
        $order = Order::where('id',$id)->get();
        foreach ($order as $key => $value) {
            $shipping_id = $value->shipping_id;
            $user_id = $value->user_id;
        }
        $user = User::where('id',$user_id)->first();
        
        
        //dd($user);
        //dd($shipping_id);
        $shipping_address = ShippingAddress::where('id',$shipping_id)->first();
        //dd($shipping_address);
        
        if ($user !=null) {
            $data['customer_info'] =$user;
            $email = $user->email;
        }elseif($shipping_address !=null) {
            $data['customer_info'] =$shipping_address;
            $email = $shipping_address->email;
        }       
        if ($email != $mail) {
            return redirect()->route('home');
        } 
        
        //dd($user);
        //dd($shipping_address);
        $order_details = OrderDetail::join('products', 'order_details.product_id', '=', 'products.id')
            ->leftjoin('promotions','order_details.promotion_id','=','promotions.id')
            ->where('order_id',$id)->select('products.name','products.color', 'order_details.quantity','order_details.price','promotions.discount')
            ->get();
        $categories = Category::get();
        $data['order'] =$order;
        $data['order_details'] =$order_details;
        $data['categories'] =$categories;
        
        return view('order_info',$data);
    }
    public function orderCancel($id){
        $order = Order::find($id);
        $order->status = OrderStatus::CANCELLED;
        DB::beginTransaction();
        try {
            $order->save();

            DB::commit();

            return redirect()->refresh()->route('order_detail');
        } catch (\Exception $ex) {
            DB::rollBack();
            // have error so will show error message
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
    public function myOrder($id){
        $data = [];
        $orders = Order::where('user_id',$id)->paginate(5);
        //dd($orders);
        
        
        if (Auth::user()->id != $id) {
            return redirect()->route('dashboard');
        }
        
        // $listProductId = [];
        // foreach ($orders as $order) {
        //         $listProductId[] = $order->id;
        //     }
        //     //dd($listProductId);
            
        //     $order_details = OrderDetail::whereIn('order_id', $listProductId)
        //         ->get();
        //     //dd($order_details); 
        
        $order_status= OrderStatus::getValues();
        //dd($order_status);
        $data['order_status'] = $order_status;
        $data['orders'] =$orders;
       
        // $data['order_details'] =$order_details; 
        return view('dashboards.orders.myorder',$data);
    }
    public function orderDetail($id){
        $data = [];
        $order = Order::findOrFail($id);
        $user_id = $order->user_id;
        $user = User::find($user_id);
        if ($user_id == null) {
            return redirect()->route('dashboard');
        }
        $order_details = OrderDetail::join('products', 'order_details.product_id', '=', 'products.id')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->leftjoin('promotions','order_details.promotion_id','=','promotions.id')
        ->where('order_id',$id)->select('products.name','products.id as product_id','orders.id as order_id','products.color','order_details.price', 'order_details.quantity','promotions.discount')
        ->get();
        foreach ($order_details as $key => $order_detail) {
            $product_id[]=$order_detail->product_id;
        }
        
        $products = Product::whereIn('id',$product_id)->get();
        foreach ($products as $key => $product) {
            $image[$product->id] = $product->oneimage->name;
        }
        //dd($image);
        $data['order_details'] = $order_details;
        $data['products'] = $products;
        $data['user'] = $user;
        $data['image'] = $image;
        return view('dashboards.orders.order_detail',$data);
    }
    public function searchByStatus(Request $request)
    {
       $data = [];
       $status =$request->status;
       //dd($status);
       $order_by_status = Order::join('users','orders.user_id','=','users.id')->where('orders.status',$status)->select('orders.id','orders.status','orders.order_date','users.name')->paginate(5);
       //dd($order_by_status);
       $order_status= OrderStatus::getValues();
       $data['order_by_status'] =$order_by_status;
       $data['order_status'] = $order_status;
       return view('dashboards.orders.myorder',$data);
    }
    public function searchByDate(Request $request)
    {
       $data =[];
       $from_day = $request->from_day;
       $to_day = $request->to_day;
       if ($to_day == null && $from_day !=null) {
        $order_by_date = Order::join('users','orders.user_id','=','users.id')->whereDate('order_date',$from_day)->select('orders.id','orders.status','orders.order_date','users.name')->paginate(5);
        $data['order_by_date'] = $order_by_date;
        //dd($order_by_date);
        $order_status= OrderStatus::getValues();
        $data['order_status'] = $order_status;
        return view('dashboards.orders.myorder',$data);
       }elseif($from_day == null && $to_day !=null){
        $order_by_date = Order::join('users','orders.user_id','=','users.id')->whereDate('order_date',$to_day)->select('orders.id','orders.status','orders.order_date','users.name')->paginate(5);
        $data['order_by_date'] = $order_by_date;
        //($order_by_date);
        $order_status= OrderStatus::getValues();
        $data['order_status'] = $order_status;
        return view('dashboards.orders.myorder',$data);
       }
       $order_by_date = Order::join('users','orders.user_id','=','users.id')->whereBetween('order_date',[$from_day,$to_day])->select('orders.id','orders.status','orders.order_date','users.name')->paginate(5);
       //dd($order_by_date);
       $data['order_by_date'] = $order_by_date;
       $order_status= OrderStatus::getValues();
       $data['order_status'] = $order_status;
       return view('dashboards.orders.myorder',$data);
    }
    public function searchByCode(Request $request)
    {
       $data = [];
       $order_by_code = Order::join('users','orders.user_id','=','users.id')->where('orders.id',$request->code)->select('orders.id','orders.status','orders.order_date','users.name')->get();
       //dd($order_by_code);
       $order_status= OrderStatus::getValues();
       $data['order_status'] = $order_status;
       $data['order_by_code'] = $order_by_code;
       return view('dashboards.orders.myorder',$data);
    }
}
