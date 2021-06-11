@extends('dashboards/layouts.master')
@section('title', 'My Order')
@section('content')



<h1>My Order</h1> 
<div class="row">
    <div class="col-3">
        <b>Search Order By Status</b>
        <br>
        <br>
        
        <style>
            #form_css{
                width: 100%;
            }
        </style>
        <div id="form_css">
            <form action="{{ route('search_by_status') }}" method="get">
                <div class="form-inline">
                    <select name="status" class="form-control">
                        @if(!empty($order_status))
                        <option value="{{$order_status['0']}}" {{$order_status['0'] ==  request()->get('status')  ? 'selected' : ''}}>{{$order_status['0']}}</option>
                        <option value="{{$order_status['1']}}" {{$order_status['1'] == request()->get('status') ? 'selected' : ''}} >{{$order_status['1']}}</option>
                        <option value="{{$order_status['2']}}" {{$order_status['2'] == request()->get('status') ? 'selected' : ''}}>{{$order_status['2']}}</option>
                        <option value="{{$order_status['3']}}" {{$order_status['3'] == request()->get('status') ? 'selected' : ''}}>{{$order_status['3']}}</option>
                        @endif
                    </select>
                        
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-3">
        <b>Search Order By Order Code</b>
        <br>
        <br>
        <form action="{{ route('search_by_code') }}">
            <div class="form-inline">
                <input type="text" value="{{request()->get('code')}}"  name="code">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        
        </form>
    </div>
    <div class="col-6">
        <b>Search Order By Date</b>
        <br>
        <br>
        <style>
            .form_css{
                width: 100%;
            }
        </style>
        <div class="form_css">
            <form action="{{ route('search_by_date') }}">
                <div class="form-inline">
                    <label for="" >From Day</label>
                    <input type="date" name="from_day">
                    <label for="" >To Day</label>
                    <input type="date"  name="to_day">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            
            </form>
        </div
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@if (!empty($orders))
<table id="product-list" class="table table-bordered table-hover table-striped">
    <thead class="bg-info">
        <tr>
            <th>Order Code</th>
            <th>Order Date</th>
            
            <th>Order Status</th>
            <th>view order detail</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($orders as $od)
        <tr>
            <td>{{$od->id}}</td>
            <td>{{$od->order_date}}</td>
            
            <td>{{$od->status}}@if ($od->status == 'PENDING')
                <a href="{{ route('order_cancel',$od->id) }}">Cancel?</a>
            @endif</td>
            <td><a href="{{ route('order_detail',$od->id) }}">view order detail</a></td>
        </tr>
        @endforeach
            
        
    </tbody>
</table>   
{{ $orders->links() }}
@endif
@if (!empty($order_by_status))
<table id="product-list" class="table table-bordered table-hover table-striped">
    <thead class="bg-info">
        <tr>
            <th>Order Code</th>
            <th>Order Date</th>
            
            <th>Order Status</th>
            <th>view order detail</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($order_by_status as $od)
        <tr>
            <td>{{$od->id}}</td>
            <td>{{$od->order_date}}</td>
            
            <td>{{$od->status}}@if ($od->status == 'PENDING')
                <a href="{{ route('order_cancel',$od->id) }}">Cancel?</a>
            @endif</td>
            <td><a href="{{ route('order_detail',$od->id) }}">view order detail</a></td>
        </tr>
        @endforeach
            
        
    </tbody>
</table>   
{{ $order_by_status->links() }}
@endif    
@if (!empty($order_by_date))
<table id="product-list" class="table table-bordered table-hover table-striped">
    <thead class="bg-info">
        <tr>
            <th>Order Code</th>
            <th>Order Date</th>
            
            <th>Order Status</th>
            <th>view order detail</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($order_by_date as $od)
        <tr>
            <td>{{$od->id}}</td>
            <td>{{$od->order_date}}</td>
            
            <td>{{$od->status}}@if ($od->status == 'PENDING')
                <a href="{{ route('order_cancel',$od->id) }}">Cancel?</a>
            @endif</td>
            <td><a href="{{ route('order_detail',$od->id) }}">view order detail</a></td>
        </tr>
        @endforeach
            
        
    </tbody>
</table>   
{{ $order_by_date->links() }}
@endif     
@if (!empty($order_by_code))
<table id="product-list" class="table table-bordered table-hover table-striped">
    <thead class="bg-info">
        <tr>
            <th>Order Code</th>
            <th>Order Date</th>
            
            <th>Order Status</th>
            <th>view order detail</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($order_by_code as $od)
        <tr>
            <td>{{$od->id}}</td>
            <td>{{$od->order_date}}</td>
            
            <td>{{$od->status}}@if ($od->status == 'PENDING')
                <a href="{{ route('order_cancel',$od->id) }}">Cancel?</a>
            @endif</td>
            <td><a href="{{ route('order_detail',$od->id) }}">view order detail</a></td>
        </tr>
        @endforeach
            
        
    </tbody>
</table>   
{{-- {{ $order_by_date->links() }} --}}
@endif 
@endsection
