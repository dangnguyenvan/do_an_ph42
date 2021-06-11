@extends('layouts.master')
@section('title', 'Checkout')
@section('content')
<br>
<div class="">
    <div class="product-content-right">
        <div class="woocommerce">
            <div class="" style="">
                <h1>Customer info</h1>
            </div>
            <form action="{{ route('cart.checkout-complete')}}" class="checkout" method="post" name="checkout">

                @csrf
                <div class="col-md-6">
                    <div id="customer_details" class="col2-set">
                        <div class="col-1">
                            <div class="woocommerce-billing-fields">
                                <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                    <label class="" for="billing_last_name"> Name <abbr title="required"
                                            class="required">*</abbr>
                                    </label>
                                    <input type="text" value="{{ Auth::user() != null ? Auth::user()->name : '' }}"
                                        placeholder="" id="billing_last_name" name="full_name" class="input-text ">
                                </p>
                                <div class="clear"></div>
                                <p id="billing_address_1_field"
                                    class="form-row form-row-wide address-field validate-required">
                                    <label class="" for="billing_address_1">Address <abbr title="required"
                                            class="required">*</abbr>
                                    </label>
                                    <input type="text" value="{{ Auth::user() != null ? Auth::user()->address : '' }}"
                                        placeholder="" id="billing_address_1" name="address" class="input-text ">
                                </p>



                                <p id="billing_email_field"
                                    class="form-row form-row-first validate-required validate-email">
                                    <label class="" for="billing_email">Email Address <abbr title="required"
                                            class="required">*</abbr>
                                    </label>
                                    <input type="text" value="{{ Auth::user() != null ? Auth::user()->email : '' }}"
                                        placeholder="" id="billing_email" name="email" class="input-text ">
                                </p>

                                <p id="billing_phone_field"
                                    class="form-row form-row-last validate-required validate-phone">
                                    <label class="" for="billing_phone">Phone <abbr title="required"
                                            class="required">*</abbr>
                                    </label>
                                    <input type="text" value="{{ Auth::user() != null ? Auth::user()->phone : '' }}"
                                        placeholder="" id="billing_phone" name="phone" class="input-text ">
                                </p>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 id="order_review_heading">Your order</h3>

                    <div id="order_review" style="position: relative;">
                        <table class="shop_table">
                            @php
                            $order_total = 0;
                            @endphp
                            @foreach ($products as $key => $pr)
                            @if ($carts[$pr->id]['promotion_id'] != null)
                            <span class="amount">
                                @php
                                $price=$pr->price;
                                $discount=$carts[$pr->id]['discount'];
                                $price = $pr->promotional_price($price,$discount);
                                @endphp
                            </span>
                            @else
                            @php
                            $price=$carts[$pr->id]['price'];
                            @endphp 
                            @endif
                            @php
                            $quantity =$carts[$pr->id]['quantity'] ;
                            $total = $pr->getTotal($price, $quantity);

                            $order_total +=$total;
                            @endphp
                            @endforeach

                            <tfoot>

                                <tr class="cart-subtotal">
                                    <th>Cart Subtotal</th>
                                    <td><span class="amount">${{$order_total}}</span>
                                    </td>
                                </tr>

                                <tr class="shipping">
                                    <th>Shipping and Handling</th>
                                    <td>

                                        Free Shipping
                                        <input type="hidden" class="shipping_method" value="free_shipping"
                                            id="shipping_method_0" data-index="0">
                                    </td>
                                </tr>


                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">${{$order_total}}</span></strong> </td>
                                </tr>

                            </tfoot>


                            <input type="hidden" name="total_price" value="{{$order_total}}">
                        </table>
                        <button type="submit">place order</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
{{ Session::get('error') }}
@endsection