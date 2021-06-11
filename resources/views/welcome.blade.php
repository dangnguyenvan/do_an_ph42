@extends('layouts.master')

@section('content')
<div class="slider-area">
    <!-- Slider -->
    <div class="block-slider block-slider4">
        
            
            
        
        <ul class="" id="bxslider-home4">
            @foreach ($product_banner as $key => $pr)

            <li><a href="{{ route('product.show', $pr->id) }}"><img style="width: 40%" src="images/{{$pr->oneimage->name}}" alt="Slide"></a>
                <div class="caption-group">
                    <h4 class="caption subtitle">{{$pr->name}}</h4>
                    <a class="caption button-radius" href="{{ route('product.show', $pr->id) }}"><span class="icon"></span>show detail</a>
                </div>
            </li>
            
            @endforeach
        </ul>
    </div>
    
</div>
<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Promotional Products</h2>
                    <div class="product-carousel">
                        @foreach ($product_promotions as $product_promotion)
                        <div class="single-product">
                            @foreach ($product_promotion->product as $pr)
                            <div class="product-f-image">
                                <img src="/images/{{$pr->oneimage->name}}" alt="">
                                <div class="product-hover">
                                    
                                    <a href="{{ route('product.show', $pr->id) }}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                           
                            <h2><a href="single-product.html">{{$pr->name}}</a></h2>
                            
                            
                            
                            <div class="product-carousel-price">
                               
                            <b>Discount: {{$product_promotion->discount}}%</b><br>
                            @php
                                $price=$pr->price;
                                $discount=$product_promotion->discount;
                                $promotional_price = $product_promotion->promotional_price($price,$discount);
                            @endphp
                            
                            
                            <b>Price: </b><del>${{$pr->price}}</del> <ins>${{$promotional_price}}</ins>
                            </div>
                            @endforeach 
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-widget-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Top Sellers</h2>
                    <a href="" class="wid-view-more">View All</a>
                    <div class="single-wid-product">
                        <a href="single-product.html"><img src="template_home/img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                        <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins>$400.00</ins> <del>$425.00</del>
                        </div>                            
                    </div>
                    <div class="single-wid-product">
                        <a href="single-product.html"><img src="template_home/img/product-thumb-2.jpg" alt="" class="product-thumb"></a>
                        <h2><a href="single-product.html">Apple new mac book 2015</a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins>$400.00</ins> <del>$425.00</del>
                        </div>                            
                    </div>
                    <div class="single-wid-product">
                        <a href="single-product.html"><img src="template_home/img/product-thumb-3.jpg" alt="" class="product-thumb"></a>
                        <h2><a href="single-product.html">Apple new i phone 6</a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins>$400.00</ins> <del>$425.00</del>
                        </div>                            
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Recently Viewed</h2>
                    <a href="#" class="wid-view-more">View All</a>
                    <div class="single-wid-product">
                        <a href="single-product.html"><img src="template_home/img/product-thumb-4.jpg" alt="" class="product-thumb"></a>
                        <h2><a href="single-product.html">Sony playstation microsoft</a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins>$400.00</ins> <del>$425.00</del>
                        </div>                            
                    </div>
                    <div class="single-wid-product">
                        <a href="single-product.html"><img src="template_home/img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                        <h2><a href="single-product.html">Sony Smart Air Condtion</a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins>$400.00</ins> <del>$425.00</del>
                        </div>                            
                    </div>
                    <div class="single-wid-product">
                        <a href="single-product.html"><img src="template_home/img/product-thumb-2.jpg" alt="" class="product-thumb"></a>
                        <h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins>$400.00</ins> <del>$425.00</del>
                        </div>                            
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Top New</h2>
                    <a href="#" class="wid-view-more">View All</a>
                    <div class="single-wid-product">
                        <a href="single-product.html"><img src="template_home/img/product-thumb-3.jpg" alt="" class="product-thumb"></a>
                        <h2><a href="single-product.html">Apple new i phone 6</a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins>$400.00</ins> <del>$425.00</del>
                        </div>                            
                    </div>
                    <div class="single-wid-product">
                        <a href="single-product.html"><img src="template_home/img/product-thumb-4.jpg" alt="" class="product-thumb"></a>
                        <h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins>$400.00</ins> <del>$425.00</del>
                        </div>                            
                    </div>
                    <div class="single-wid-product">
                        <a href="single-product.html"><img src="template_home/img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                        <h2><a href="single-product.html">Sony playstation microsoft</a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins>$400.00</ins> <del>$425.00</del>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
