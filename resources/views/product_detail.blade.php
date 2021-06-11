@section('title',' Product Detail')
@extends('layouts.master')

@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Product Detail</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="col-md-8">
    <div class="product-content-right">
        @foreach ($product_detail as $key => $pr)
        <div class="row">
            <div class="col-sm-6">
                <div class="product-images">
                    <div class="product-main-img">
                        <img style="width: 100%" src="/images/{{$pr->oneimage->name}}" alt="">
                    </div>
                    
                    <div class="product-gallery">
                        <img src="img/product-thumb-1.jpg" alt="">
                        <img src="img/product-thumb-2.jpg" alt="">
                        <img src="img/product-thumb-3.jpg" alt="">
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="product-inner">
                    <h2 class="product-name">{{$pr->name}}</h2>    
                    <div role="tabpanel">  
                        <div class="product_text">
                            
                            <p><b>Ram:</b> {{$pr->ram}}</p>
                            <p><b>Rom:</b> {{$pr->rom}}</p>
                            <p><b>Front Camera:</b> {{$pr->front_camera}}</p>
                            <p><b>Rear Camera:</b> {{$pr->rear_camera}}</p>
                            <p><b>Battery Capacity:</b> {{$pr->battery_capacity}}</p>
                            <p><b>Color:</b> {{$pr->color}}</p>
                            <p><b>Description:</b> {{$pr->description}}</p>
                        </div>
                    </div>
                    
                    <form action="{{ route('cart.add-cart', $pr->id) }}" method="POST"" class="cart">
                        @csrf
                        <input type="hidden" name="price" value="{{ $pr->price}}">
                        <div class="product-inner-price">   
                            <b>Price: </b><ins>${{$pr->price}}</ins><br> 
                            @foreach ($pr->promotion as $promotion)
                            
                            <b>Discount: {{$promotion->discount}}%</b><br>
                            @php
                                $price=$pr->price;
                                $discount=$promotion->discount;
                                $promotional_price = $promotion->promotional_price($price,$discount);
                            @endphp
                            <b>Promotional price:  </b><ins>${{$promotional_price}}</ins>
                            <input type="hidden" name="promotion_id" value="{{$promotion->id}}">
                            <input type="hidden" name="discount" value="{{$promotion->discount}}">
                            @endforeach
                        </div>
                        
                        <div>
                        
                        </div>
                        <div class="quantity">
                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                        </div>
                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                    </form>    
                    
                    
                    
                </div>
            </div>
        </div>
        @endforeach
        
        
        
        <div class="related-products-wrapper">
            <h2 class="related-products-title">Related Products</h2>
            <div class="related-products-carousel">
                <div class="single-product">
                    <div class="product-f-image">
                        <img src="/template_home/img/product-1.jpg" alt="">
                        <div class="product-hover">
                           
                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                        </div>
                    </div>

                    <h2><a href="">Sony Smart TV - 2015</a></h2>

                    <div class="product-carousel-price">
                        <ins>$700.00</ins> <del>$100.00</del>
                    </div> 
                </div>
                <div class="single-product">
                    <div class="product-f-image">
                        <img src="/template_home/img/product-2.jpg" alt="">
                        <div class="product-hover">
                           
                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                        </div>
                    </div>

                    <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                    <div class="product-carousel-price">
                        <ins>$899.00</ins> <del>$999.00</del>
                    </div> 
                </div>
                <div class="single-product">
                    <div class="product-f-image">
                        <img src="/template_home/img/product-3.jpg" alt="">
                        <div class="product-hover">
                            
                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                        </div>
                    </div>

                    <h2><a href="">Apple new i phone 6</a></h2>

                    <div class="product-carousel-price">
                        <ins>$400.00</ins> <del>$425.00</del>
                    </div>                                 
                </div>
                <div class="single-product">
                    <div class="product-f-image">
                        <img src="/template_home/img/product-4.jpg" alt="">
                        <div class="product-hover">
                            
                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                        </div>
                    </div>

                    <h2><a href="">Sony playstation microsoft</a></h2>

                    <div class="product-carousel-price">
                        <ins>$200.00</ins> <del>$225.00</del>
                    </div>                            
                </div>
                <div class="single-product">
                    <div class="product-f-image">
                        <img src="/template_home/img/product-5.jpg" alt="">
                        <div class="product-hover">
                           
                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                        </div>
                    </div>

                    <h2><a href="">Sony Smart Air Condtion</a></h2>

                    <div class="product-carousel-price">
                        <ins>$1200.00</ins> <del>$1355.00</del>
                    </div>                                 
                </div>
                <div class="single-product">
                    <div class="product-f-image">
                        <img src="/template_home/img/product-6.jpg" alt="">
                        <div class="product-hover">
                           
                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                        </div>
                    </div>

                    <h2><a href="">Samsung gallaxy note 4</a></h2>

                    <div class="product-carousel-price">
                        <ins>$400.00</ins>
                    </div>                            
                </div>                                    
            </div>
        </div>
    </div>                    
</div>
@endsection