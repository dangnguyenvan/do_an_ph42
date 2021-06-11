@extends('dashboards/layouts.master')
@section('title', 'Order Detail Customer')
@section('content')
<h1>Order Detail Customer</h1> 
<br>
<h3>Customer Information</h3>
<span>Name: {{$user->name}}</span><br>
<span>Email: {{$user->email}}</span><br>
<span>Phone: {{$user->phone}}</span><br>
<span>Address: {{$user->address}}</span>
<br>
<br>
@foreach ($order_details as $key => $order_detail)
<h3>Order Code: {{$order_detail->order_id}}</h3>
@break
@endforeach
<table id="product-list" class="table table-bordered table-hover table-striped">
    <thead class="bg-info">
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Image</th>
            <th>Color</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    @php
     $total=0;
    @endphp
    <tbody>
        @if(!empty($order_details))
        @foreach ($order_details as $key => $order_detail)
        <tr>    
            <td>{{$key+1}}</td>
            <td>{{$order_detail->name}}</td>
            <td class="product-thumbnail">
                <a href=""><img width="50" height="50" alt="poster_1_up" class="shop_thumbnail" src="/images/{{ $image[$order_detail->product_id]}}"></a>
            </td>
            <td>{{$order_detail->color}}</td>
            @if ($order_detail->discount == null)
            <td>${{$price=$order_detail->price}}</td>
            @else
                @php
                    $price=$order_detail->price;
                    $discount=$order_detail->discount;
                    $price = $order_detail->promotional_price($price,$discount);
                @endphp
                <td>${{$price}}</td>
            @endif
            <td>{{$order_detail->quantity}}</td>
            <td>${{$subtotal=$price*$order_detail->quantity}}</td>
            @php
                $total += $subtotal;
            @endphp
        </tr>
        @endforeach
            
        @endif
    </tbody>
</table>
<br>
<h1>Total: ${{ $total }}</h1>
{{-- {{ $orders->links() }} --}}
@endsection