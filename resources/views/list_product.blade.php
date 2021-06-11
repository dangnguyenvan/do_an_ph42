@section('title',' Phone')
@extends('layouts.master')

@section('content')
    @if (!empty($get_product_by_category))
    @foreach ($get_product_by_category as $key => $product)
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>{{$product->category->name}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @break
    @endforeach
    
    @elseif (!empty($product_by_search))
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>All Phone</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @if (!empty($get_product_by_category))
                @foreach ($get_product_by_category as $key => $product)
                <div class="col-md-3 col-sm-6">
                    <div class="single-product">
                        <div class="product-f-image">
                            <img style="width: 100%" src="/images/{{$product->oneimage->name}}" alt="">
                            <div class="product-hover">
                                
                                <a href="{{ route('product.show', $product->id) }}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                            </div>
                        </div>
                        <h2>{{$product->name}}</h2>
                        <div class="product-carousel-price">
                            <b>Price: </b><ins>${{$product->price}}</ins><br> 
                            @foreach ($product->promotion as $promotion)
                            
                            <b>Discount: {{$promotion->discount}}%</b><br>
                            @php
                                $promotional_price = $promotion->promotional_price($price=$product->price,$discount=$promotion->discount);
                            @endphp
                            <b>Promotional price:  </b><ins>${{$promotional_price}}</ins>
                            @endforeach
                        </div>
                        <div>&nbsp</div>
                    </div>
                </div>
                @endforeach
                @elseif(!empty($product_by_search))
                @foreach ($product_by_search as $key => $product)
                <div class="col-md-3 col-sm-6">
                    <div class="single-product">
                        <div class="product-f-image">
                            <img style="width: 100%" src="/images/{{$product->oneimage->name}}" alt="">
                            <div class="product-hover">
                                
                                <a href="{{ route('product.show', $product->id) }}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                            </div>
                        </div>
                        <h2>{{$product->name}}</h2>
                        <div class="product-carousel-price">
                            <b>Price: </b><ins>${{$product->price}}</ins><br> 
                            @foreach ($product->promotion as $promotion)
                            
                            <b>Discount: {{$promotion->discount}}%</b><br>
                            @php
                                $promotional_price = $promotion->promotional_price($price=$product->price,$discount=$promotion->discount);
                            @endphp
                            <b>Promotional price:  </b><ins>${{$promotional_price}}</ins>
                            @endforeach 
                        </div>
                        <div>&nbsp</div>
                    </div>
                </div>
                @endforeach
               
                @elseif(!empty($all_products))
                @foreach ($all_products as $key => $product)
                <div  class="col-md-3 col-sm-6">
                    <div  class="single-product">
                        <div class="product-f-image">
                            <img  src="/images/{{$product->oneimage->name}}" alt="">
                            <div class="product-hover">
                                
                                <a href="{{ route('product.show', $product->id) }}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                            </div>
                        </div>
                        <h2>{{$product->name}}</h2>
                        <div class="product-carousel-price">
                            <b>Price: </b><ins>${{$product->price}}</ins><br> 
                            
                            @foreach ($product->promotion as $promotion)
                            <b>Discount: {{$promotion->discount}}%</b><br>
                            @php
                                $promotional_price = $promotion->promotional_price($price=$product->price,$discount=$promotion->discount);
                            @endphp
                            <b>Promotional price:  </b><ins>${{$promotional_price}}</ins>
                            @endforeach
                        </div>
                        <div>&nbsp</div>
                    </div>
                </div>
                @endforeach
                @endif
                
            </div>
           @if (!empty($all_products))
               {{ $all_products->links() }}
           @endif
        </div>
    </div>
    
 @endsection
