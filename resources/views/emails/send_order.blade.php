<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <style>
        table, th, td {
          border: 1px solid black;
        }
    </style>
</head>
<body>
    <h2>Order Date: {{$dataOrder['order_date']}}</h2>
    
    @foreach ($orderDetail as $item)
        <a href="http://127.0.0.1:8000/order-info/{{$item->id}}/email/{{$mail}}">Click here to view order details</a>
        @break
    @endforeach
    <table>
        <tr>
            <th>Product</th>
            <th>Color</th>
            <th>Quantity</th>
            <th>Price</th>
            
            <th>Subtotal</th>
        </tr>
        @foreach ($orderDetail as $key => $odetail)
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
            
            <td>${{$subtotal=$price*$odetail->quantity}}</td>
        </tr>
        @endforeach
    </table>
    <h1>Total:${{$dataOrder['total_price']}}</h1>
</body>
</html>
    
    
    
    
