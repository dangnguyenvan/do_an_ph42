<?php

namespace App\Http\Controllers\Seller;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listOrderCustomer()
    {
        $data = [];
        $orders=Order::join('users','orders.user_id','=','users.id')->select('orders.id','orders.status','orders.order_date','users.name')->paginate(5);
        //dd($orders);
        
        $order_total = Order::join('users','orders.user_id','=','users.id')->count();
        $order_pending = Order::join('users','orders.user_id','=','users.id')->where('orders.status',OrderStatus::PENDING)->count();
        $order_shipping = Order::join('users','orders.user_id','=','users.id')->where('orders.status',OrderStatus::SHIPPING)->count();
        $order_completed = Order::join('users','orders.user_id','=','users.id')->where('orders.status',OrderStatus::COMPLETED)->count();
        $order_cancelled = Order::join('users','orders.user_id','=','users.id')->where('orders.status',OrderStatus::CANCELLED)->count();
        //dd($order_pending);
        $order_status= OrderStatus::getValues();
        //dd($order_status);
        $data['orders'] = $orders;
        $data['order_status'] = $order_status;
        $data['order_total'] = $order_total;
        $data['order_pending'] = $order_pending;
        $data['order_shipping'] = $order_shipping;
        $data['order_completed'] = $order_completed;
        $data['order_cancelled'] = $order_cancelled;
        return view('dashboards.seller.manage_order.list_order_customer',$data);
    }

    public function updateOrderStatusCustomer(Request $request,$id)
    {
        $order=Order::find($id);
        $order->status=$request->status;
        DB::beginTransaction();
        try{
            $order->save();
            DB::commit();
            return redirect()->route('seller.order-customer.list_order');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function OrderDetailCustomer($id)
    {
        $data = [];
        $order = Order::findOrFail($id);
        $user_id = $order->user_id;
        $user = User::find($user_id);
        if ($user_id == null) {
            return redirect()->route('seller.order-customer.list_order');
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
        return view('dashboards.seller.manage_order.order_detail_customer',$data);
    }
    public function searchByStatusCustomer(Request $request)
    {
       $data = [];
       $status =$request->status;
       //dd($status);
       $order_by_status = Order::join('users','orders.user_id','=','users.id')->where('orders.status',$status)->select('orders.id','orders.status','orders.order_date','users.name')->paginate(5);
       //dd($order_by_status);
       $order_status= OrderStatus::getValues();
       $data['order_by_status'] =$order_by_status;
       $data['order_status'] = $order_status;
       return view('dashboards.seller.manage_order.list_order_customer',$data);
    }
    public function searchByDateCustomer(Request $request)
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
        return view('dashboards.seller.manage_order.list_order_customer',$data);
       }elseif($from_day == null && $to_day !=null){
        $order_by_date = Order::join('users','orders.user_id','=','users.id')->whereDate('order_date',$to_day)->select('orders.id','orders.status','orders.order_date','users.name')->paginate(5);
        $data['order_by_date'] = $order_by_date;
        //($order_by_date);
        $order_status= OrderStatus::getValues();
        $data['order_status'] = $order_status;
        return view('dashboards.seller.manage_order.list_order_customer',$data);
       }
       $order_by_date = Order::join('users','orders.user_id','=','users.id')->whereBetween('order_date',[$from_day,$to_day])->select('orders.id','orders.status','orders.order_date','users.name')->paginate(5);
       //dd($order_by_date);
       $data['order_by_date'] = $order_by_date;
       $order_status= OrderStatus::getValues();
       $data['order_status'] = $order_status;
       return view('dashboards.seller.manage_order.list_order_customer',$data);
    }
    public function searchByCodeCustomer(Request $request)
    {
       $data = [];
       $order_by_code = Order::join('users','orders.user_id','=','users.id')->where('orders.id',$request->code)->select('orders.id','orders.status','orders.order_date','users.name')->get();
       //dd($order_by_code);
       $order_status= OrderStatus::getValues();
       $data['order_status'] = $order_status;
       $data['order_by_code'] = $order_by_code;
       return view('dashboards.seller.manage_order.list_order_customer',$data);
    }









    //////////Guest
    public function listOrderGuest()
    {
        $data = [];
        $orders=Order::join('shipping_address','orders.shipping_id','=','shipping_address.id')->select('orders.id','orders.status','orders.order_date','shipping_address.name')->paginate(5);
        //dd($orders);
        $order_status= OrderStatus::getValues();
        $order_total = Order::join('shipping_address','orders.shipping_id','=','shipping_address.id')->count();
        $order_pending = Order::join('shipping_address','orders.shipping_id','=','shipping_address.id')->where('orders.status',OrderStatus::PENDING)->count();
        $order_shipping = Order::join('shipping_address','orders.shipping_id','=','shipping_address.id')->where('orders.status',OrderStatus::SHIPPING)->count();
        $order_completed = Order::join('shipping_address','orders.shipping_id','=','shipping_address.id')->where('orders.status',OrderStatus::COMPLETED)->count();
        $order_cancelled = Order::join('shipping_address','orders.shipping_id','=','shipping_address.id')->where('orders.status',OrderStatus::CANCELLED)->count();
        //dd($order_status);
        $data['orders'] = $orders;
        $data['order_status'] = $order_status;
        $data['order_total'] = $order_total;
        $data['order_pending'] = $order_pending;
        $data['order_shipping'] = $order_shipping;
        $data['order_completed'] = $order_completed;
        $data['order_cancelled'] = $order_cancelled;
        return view('dashboards.seller.manage_order.list_order_guest',$data);
    }

    public function updateOrderStatusGuest(Request $request,$id)
    {
        $order=Order::find($id);
        $order->status=$request->status;
        DB::beginTransaction();
        try{
            $order->save();
            DB::commit();
            return redirect()->route('seller.order-guest.list_order');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function OrderDetailGuest($id)
    {
        $data = [];
        $order = Order::findOrFail($id);
        $shipping_address_id = $order->shipping_id;
        $shipping_address= ShippingAddress::find($shipping_address_id);
        if ($shipping_address_id == null) {
            return redirect()->route('seller.order-guest.list_order');
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
        $data['shipping_address'] = $shipping_address;
        $data['image'] = $image;
        return view('dashboards.seller.manage_order.order_detail_guest',$data);
    }
    public function searchByStatusGuest(Request $request)
    {
       $data = [];
       $status =$request->status;
       //dd($status);
       $order_by_status = Order::join('shipping_address','orders.shipping_id','=','shipping_address.id')->where('orders.status',$status)->select('orders.id','orders.status','orders.order_date','shipping_address.name')->paginate(5);
       //dd($order_by_status);
       $order_status= OrderStatus::getValues();
       $data['order_by_status'] =$order_by_status;
       $data['order_status'] = $order_status;
       return view('dashboards.seller.manage_order.list_order_guest',$data);
    }
    public function searchByDateGuest(Request $request)
    {
       $data =[];
       
       $from_day = $request->from_day;
       $to_day = $request->to_day;
       if ($to_day == null && $from_day !=null) {
        $order_by_date = Order::join('shipping_address','orders.shipping_id','=','shipping_address.id')->whereDate('order_date',$from_day)->select('orders.id','orders.status','orders.order_date','shipping_address.name')->paginate(5);
        $data['order_by_date'] = $order_by_date;
        //dd($order_by_date);
        $order_status= OrderStatus::getValues();
        $data['order_status'] = $order_status;
        return view('dashboards.seller.manage_order.list_order_guest',$data);
       }elseif($from_day == null && $to_day !=null){
        $order_by_date = Order::join('shipping_address','orders.shipping_id','=','shipping_address.id')->whereDate('order_date',$to_day)->select('orders.id','orders.status','orders.order_date','shipping_address.name')->paginate(5);
        $data['order_by_date'] = $order_by_date;
        //dd($order_by_date);
        $order_status= OrderStatus::getValues();
        $data['order_status'] = $order_status;
        return view('dashboards.seller.manage_order.list_order_guest',$data);
       }
       $order_by_date = Order::join('shipping_address','orders.shipping_id','=','shipping_address.id')->whereBetween('order_date',[$from_day,$to_day])->select('orders.id','orders.status','orders.order_date','shipping_address.name')->paginate(5);
       //dd($order_by_date);
       $data['order_by_date'] = $order_by_date;
       $order_status= OrderStatus::getValues();
       $data['order_status'] = $order_status;
       return view('dashboards.seller.manage_order.list_order_guest',$data);
    }

    public function searchByCodeGuest(Request $request)
    {
        $data = [];
       $order_by_code = Order::join('shipping_address','orders.shipping_id','=','shipping_address.id')->where('orders.id',$request->code)->select('orders.id','orders.status','orders.order_date','shipping_address.name')->get();
       //dd($order_by_code);
       $order_status= OrderStatus::getValues();
       $data['order_status'] = $order_status;
       $data['order_by_code'] = $order_by_code;
       return view('dashboards.seller.manage_order.list_order_guest',$data);
    }
}
