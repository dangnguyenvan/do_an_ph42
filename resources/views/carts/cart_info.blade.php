@extends('layouts.master')
@section('title', 'Cart Page')
@section('content')
@if (empty($products))
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>No products in the cart <a style="color: black" href="{{ route('home') }}">Continue Shopping</a></h2> 
                </div>
            </div>
        </div>
    </div>
</div> 
@elseif(!empty($products))
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shopping Cart</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if (!empty($products))
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-content-right">
                    <div class="woocommerce">
                            
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th>Color</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">&nbsp;</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($products as $key => $pr)
                                    <tr class="cart_item">
                                       <td>{{$key+1}}</td>
                                        <td class="product-name">
                                            <a href="single-product.html">{{$pr->name}}</a> 
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="/images/{{$pr->oneimage->name}}"></a>
                                        </td>

                                       <td>{{$carts[$pr->id]['color_name']}}</td>

                                        <td class="product-price">
                                            <span class="amount">${{$carts[$pr->id]['price']}}</span> 
                                        </td>

                                        <td class="product-quantity">
                                            <div class="quantity buttons_added">
                                                
                                                <input type="number" size="4" class="input-text qty text" title="Qty" value="{{$carts[$pr->id]['quantity']}}" min="0" step="1">
                                                
                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount">
                                                    @php
                                                    $money = $carts[$pr->id]['quantity'] * $carts[$pr->id]['price'];
                                                     echo ($money) ;
                                
                                                    @endphp
                                            </span> 
                                        </td>
                                        <td class="product-remove">
                                            <a title="Remove this item" class="remove" href="#">×</a> 
                                        </td>
                                    </tr>
                                    
                                </tbody>
                                @endforeach
                            </table>
                           
                            
                            <a href="{{ route('home') }}"><input type="submit" value="continue shopping" name="update_cart" class="button"></a>
                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">£15.00</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>Free Shipping</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">£15.00</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="submit" value="Checkout" name="proceed" class="checkout-button button alt wc-forward">
                            </div>
                            
                       
                    </div>
                </div>    
            </div>
        </div>    
    </div>
</div> 


@endif


@endsection