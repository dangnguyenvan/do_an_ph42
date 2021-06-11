<?php

namespace App\Http\Controllers;

use App\Enums\ActiveStatus;
use App\Enums\OrderStatus;
use App\Mail\SendOrder;
use App\Models\Category;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ShippingAddress;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addCart($id, Request $request)
    {
        //get data from SESSION
        $carts = empty(Session::get('carts')) ? [] : Session::get('carts');
        
        
        // validate ID of table product ? available TRUE | FALSE
        // check quantity of products.quantity compare with order_detail.quantity
        $product = Product::findOrFail($id);
        
        
        if (empty($carts)) {
            $newProduct = [
                'id' => $id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'promotion_id' =>$request->promotion_id,
                'discount' =>$request->discount
            ];
        }else{
            $newProduct = [
                'id' => $id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'promotion_id' =>$request->promotion_id,
                'discount' =>$request->discount
            ];
        }
        
        foreach($carts as $cart){
            if (!empty($carts) && $cart['id'] == $id ) {
                    
                    $carts[$id]['quantity'] = $cart['quantity']+ $request->quantity ;
                    //dd($cart['quantity']);
                    session(['carts' => $carts]);
                    return redirect()->route('cart.cart-info');
                    break;
                } 
        }
        $carts[$id] = $newProduct;
        
        //dd($carts[$id]);
        // set data for SESSION
        session(['carts' => $carts]);
        return redirect()->route('cart.cart-info');
    }
    public function getCartInfo( Request $request)
    {
        
        $data = [];
        $categories = Category::get();
        //get cart info from SESSION
        $carts = empty(Session::get('carts')) ? [] : Session::get('carts');
        $data['carts'] = $carts;

        $dataCart = [];
        if (!empty($carts)) {
            // create list product id
            $listProductId = [];
            foreach ($carts as $cart) {
                $listProductId[] = $cart['id'];
            }

            // get data product from list product id
            $dataCart = Product::whereIn('id', $listProductId)
                ->get();
               
            
        }
        //dd($dataCart);
        $data['categories'] =$categories;
        $data['products'] = $dataCart;
        

        return view('carts.cart_info', $data);
    }
    public function removeCart($id,Request $request)
    {
        //get data from SESSION
        $carts = empty(Session::get('carts')) ? [] : Session::get('carts');
        //dd($carts);

        //delete item
        Arr::pull($carts, $id);

        // store session
        session(['carts' => $carts]);
        //dd($carts);
        return redirect()->back();
    }
    public function updateCart(Request $request,$id){
        $carts = empty(Session::get('carts')) ? [] : Session::get('carts');

        foreach($carts as $cart){
            if (!empty($carts) && $cart['id'] == $id ) {
                $carts[$id]['quantity'] =  $request->quantity ;
                    
                } 
        }
        
        session(['carts' => $carts]);
        return redirect()->back();
    }

    public function checkout(Request $request)
    {
        //dd($request->checkout);
        $data = [];
        $categories = Category::get();
        //get cart info from SESSION
        $carts = empty(Session::get('carts')) ? [] : Session::get('carts');
        if (empty($carts)) {
            return redirect()->route('home');
        }
        // $order_total = [
        //     'total' => $request->order_total
        // ];
        // dd($order_total);
        
        $data['carts'] = $carts;

        if (!empty($carts)) {
            $dataCart = [];

            // create list product id
            $listProductId = [];
            foreach ($carts as $cart) {
                $listProductId[] = $cart['id'];
            }

            // get data product from list product id
            $dataCart = Product::whereIn('id', $listProductId)
                ->get();
            $data['products'] = $dataCart;

            
        }
        
        $data['categories'] =$categories;
        return view('carts.checkout', $data);
    }
    public function checkoutComplete(Request $request)
    {
        $mail = $request->email;
        $carts = Session::get('carts');
        if (empty($carts)) {
            return redirect()->route('home');
        }
        $date = date('Y-m-d');
        $data_shipping_address = [
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'name' =>$request->full_name
        ];
        
        DB::beginTransaction();
        try {
            
            
            if (Auth::user() ==null) {
                $shipping_address = ShippingAddress::create($data_shipping_address);
                //dd('abc');
                $shipping_address_id = $shipping_address->id;
            }else{
                $shipping_address_id = null;
            }
            if (Auth::user() !=null) {
                $user_id = Auth::user()->id;
            }else{
                $user_id = null;
            }
            $data_order = [
                'order_date' => $date,
                'total_price' => $request->total_price,
                'status' => OrderStatus::PENDING,
                'user_id' => $user_id,
                'shipping_id' => $shipping_address_id
            ];
            $order = Order::create($data_order);
            $order_id = $order->id;
            
            if (!empty($carts)) {
                foreach ($carts as $cart) {
                    $product_id = $cart['id'];
                    $quantity = $cart['quantity'];
                    $price = $cart['price'];
                    
                    if ($cart['promotion_id'] == null) {
                        $promotion_id = null;
                    }else{
                        $promotion_id = $cart['promotion_id'];
                    }
                    
                   
                    $order_detail = [
                        'product_id' => $product_id,
                        'order_id' => $order_id,
                        'price' => $price,
                        'quantity' => $quantity,
                        'promotion_id' =>$promotion_id
                    ];
                    // save data into table order_details
                    OrderDetail::create($order_detail);
                }
            }
            $order_details = OrderDetail::join('products', 'order_details.product_id', '=', 'products.id')
            ->join('orders','order_details.order_id', '=', 'orders.id')
            ->leftjoin('promotions','order_details.promotion_id','=','promotions.id')
            ->where('order_id',$order_id)->select('products.name','products.color','orders.id', 'order_details.quantity','order_details.price','promotions.discount')
            ->get();
            //dd($order_details);
            DB::commit();
      
            Mail::to($mail)->send(new SendOrder($order_details,$data_order,$mail));
            
            $request->session()->forget('carts');
            $data = [];
            $categories = Category::get();
            $data['categories'] =$categories;
            return view('carts.checkout_status',$data,compact('order_id','mail'));
        } catch (Exception $exception) {
            DB::rollBack();
            
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    
}
