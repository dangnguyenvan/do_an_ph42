<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
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
        
        $color = Color::where('id',$request->color_id)->get();
        foreach($color as $color){
            $color_name = $color->color_name;
        }
        if (!empty($carts)) {
            $newProduct = [
                'id' => $id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'color_id' => $request->color_id,
                'color_name' => $color_name
            ];
        }
        
        #check have param $id ?
        if (empty($carts)) {
            $newProduct = [
                'id' => $id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'color_id' => $request->color_id,
                'color_name' => $color_name
            ];
            
        }else{    
            foreach($carts as $cart){
                if ($cart['id'] == $id ) {
                    $newProduct = [
                        'id' => $id,
                        'quantity' =>$cart['quantity']  + $request->quantity,
                        'price' => $request->price,
                        'color_id' => $request->color_id,
                        'color_name' => $color_name
                       
                    ];
                    
                } 
            }   
            
            
        }
        
        
        $carts[$id] = $newProduct;
        
        //dd($carts);
        // set data for SESSION
        session(['carts' => $carts]);
        return redirect()->route('cart.cart-info')
            ->with('success', 'Add Product to Cart successful!');
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

            // add step by step to SESSION
            session(['step_by_step' => 1]);
        }
        //dd($dataCart);
        $data['categories'] =$categories;
        $data['products'] = $dataCart;

        return view('carts.cart_info', $data);
    }
}
