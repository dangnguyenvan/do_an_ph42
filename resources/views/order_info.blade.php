@extends('layouts.master')
@section('title', 'Order Detail')
@section('content')
<style>
    table, th, td {
      border: 1px solid black;
    }
</style>
    
    

        
    
<h3>Customer Information</h3>
<span>Name: {{$customer_info->name}}</span><br>
<span>Email: {{$customer_info->email}}</span><br>
<span>Phone: {{$customer_info->phone}}</span><br>
<span>Address: {{$customer_info->address}}</span>   
    
   


    

@foreach ($order as $od)
    <h3>Order Information</h3>
    <span>Order Code: {{$od->id}}</span><br>
    <span>Order Date: {{$od->order_date}}</span><br>
    <span>Order Status: {{$od->status}}</span>
    @if ($od->status == 'PENDING')
        <a href="{{ route('order_cancel',$od->id) }}">Cancel?</a>
    @endif
<br>
<br>
<table>
    <tr>
        <th>Product</th>
        <th>Color</th>
        <th>Quantity</th>
        <th>Price</th>
        
        <th>Subtotal</th>
    </tr>
    @foreach ($order_details as $key => $odetail)
    <tr>
        <td>{{$odetail->name}}</td>
        <td>{{$odetail->color}}</td>
        <td>{{$odetail->quantity}}</td>
        @if ($odetail->discount == null)
            <td>${{$price=$odetail->price}}</td>
        @else
                @php
                    $price=$odetail->price;
                    $discount=$odetail->discount;
                    $price = $odetail->promotional_price($price,$discount);
                @endphp
                <td>${{$price}}</td>
        @endif
        <td>${{$total=$price*$odetail->quantity}}</td>
    </tr>
    @endforeach
</table>
<br>
<h4>Total:${{$od->total_price}}</h4>
@endforeach

@endsection