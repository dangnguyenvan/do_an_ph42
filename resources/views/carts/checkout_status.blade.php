@extends('layouts.master')
@section('title', 'Checkout Status')
@section('content')
        <div class="product-big-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-bit-title text-center">
                            {{-- @php
                                echo $mail;
                                echo $order_id;
                            @endphp --}}
                            {{-- <a href="{{ route('product.test', ['test_id' => $testId, 'custom_id' => $customId]) }}">Link</a> --}}
                            <h2>Your Order was successful!<a style="color: black" href="{{ route('order_info',['order_id' => $order_id, 'email' => $mail]) }}">Click here to view order status</a></h2> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection   
