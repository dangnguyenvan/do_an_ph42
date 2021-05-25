<?php

namespace App\Http\Controllers;

use App\Enums\ActiveStatus;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $categories = Category::get();
        
        $all_products = Product::where('status',ActiveStatus::ACTIVE)->with('images')->paginate(12);
        $data['categories'] =$categories;
        $data['all_products'] = $all_products;
        return view('list_product',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $categories = Category::get();
        $product_detail = Product::with('colors')->with('images')->where('status',ActiveStatus::ACTIVE)
        ->where('id',$id)->get();
    
      
        foreach($product_detail as $key =>$pr){
            
           $colors = Color::where('product_id',$pr->id)->get();
        }
        //dd($product_detail);
        $data['categories'] =$categories;
        $data['colors'] =$colors;
        $data['product_detail'] = $product_detail;
        return view('product_detail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
