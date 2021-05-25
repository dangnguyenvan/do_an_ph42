<?php

namespace App\Http\Controllers;

use App\Enums\ActiveStatus;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $product_banner = Product::where('status',ActiveStatus::ACTIVE)->with('images')->take(3)->get();
        //dd($product_banner);
        //$product_promotion = DB::table('products')->join('product_promotion','products.id','=','product_promotion.product_id')->get();
        //dd($product_promotion);
        $categories = Category::get();
        $data['product_banner'] = $product_banner;
        $data['categories'] =$categories;
        return view('welcome', $data);

    }
    public function show($id){
        
        $data = [];
        $categories = Category::get();
        $get_product_by_category = Product::with('category')->where('status',ActiveStatus::ACTIVE)->where('id','=',$id)->paginate(12);
        //dd($get_product_by_category);
        $data['get_product_by_category'] =$get_product_by_category;
        $data['categories'] =$categories;
        return view('list_product',$data);
    }
    public function search(Request $request){
        $data = [];
        $product_by_search = Product::where('name', 'like', '%' . $request->name . '%')->where('status',ActiveStatus::ACTIVE)->get();
        $categories = Category::get();
        $data['product_by_search'] =$product_by_search;
        //dd($product_by_search);
        $data['categories'] =$categories;
        return view('list_product',$data);
    }
    
}
