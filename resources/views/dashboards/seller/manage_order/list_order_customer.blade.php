@extends('dashboards/layouts.master')
@section('title', 'List Order Customer')
@section('content')
<h1>List Order Customer</h1> 

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
            <form action="{{ route('seller.order-customer.search_by_status') }}" method="get">
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
        <form action="{{ route('seller.order-customer.search_by_code') }}">
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
            <form action="{{ route('seller.order-customer.search_by_date') }}">
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


@if (!empty($order_by_code))
<table id="product-list" class="table table-bordered table-hover table-striped">
    <thead class="bg-info">
        <tr>
            <th>#</th>
            <th>Order Code</th>
            <th>Name Customer</th>
            <th>Order Date</th>
            <th>view order detail</th>
            <th>Order Status</th>
            <th>Update Status</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($order_by_code as $key => $od)
        <tr>    
            <td>{{$key+1}}</td>
            <td>{{$od->id}}</td>
            <td>{{$od->name}}</td>
            <td>{{$od->order_date}}</td>
            <td><a href="{{ route('seller.order-customer.order_detail',$od->id) }}">view order detail</a></td>
            <td>{{$od->status}}</td>
            <td>
                
                <form action="{{ route('seller.order-customer.update_status_order', $od->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <select name="status" class="form-control">
                        @if(!empty($order_status))
                            
                            <option value="{{$order_status['0']}}" {{$order_status['0'] == $od->status ? 'selected' : ''}}>{{$order_status['0']}}</option>
                            <option value="{{$order_status['1']}}" {{$order_status['1'] == $od->status ? 'selected' : ''}} >{{$order_status['1']}}</option>
                            <option value="{{$order_status['2']}}" {{$order_status['2'] == $od->status ? 'selected' : ''}}>{{$order_status['2']}}</option>
                            <option value="{{$order_status['3']}}" {{$order_status['3'] == $od->status ? 'selected' : ''}}>{{$order_status['3']}}</option>
                        @endif
                    </select>
                        
                    <button type="submit" class="fa fa-refresh"></button>
                </form>
                
            </td>
            
        </tr>
        @endforeach
            
        
    </tbody>
</table>

@endif
@if (!empty($order_by_date))
<table id="product-list" class="table table-bordered table-hover table-striped">
    <thead class="bg-info">
        <tr>
            <th>#</th>
            <th>Order Code</th>
            <th>Name Customer</th>
            <th>Order Date</th>
            <th>view order detail</th>
            <th>Order Status</th>
            <th>Update Status</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($order_by_date as $key => $od)
        <tr>    
            <td>{{$key+1}}</td>
            <td>{{$od->id}}</td>
            <td>{{$od->name}}</td>
            <td>{{$od->order_date}}</td>
            <td><a href="{{ route('seller.order-customer.order_detail',$od->id) }}">view order detail</a></td>
            <td>{{$od->status}}</td>
            <td>
                
                <form action="{{ route('seller.order-customer.update_status_order', $od->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <select name="status" class="form-control">
                        @if(!empty($order_status))
                            
                            <option value="{{$order_status['0']}}" {{$order_status['0'] == $od->status ? 'selected' : ''}}>{{$order_status['0']}}</option>
                            <option value="{{$order_status['1']}}" {{$order_status['1'] == $od->status ? 'selected' : ''}} >{{$order_status['1']}}</option>
                            <option value="{{$order_status['2']}}" {{$order_status['2'] == $od->status ? 'selected' : ''}}>{{$order_status['2']}}</option>
                            <option value="{{$order_status['3']}}" {{$order_status['3'] == $od->status ? 'selected' : ''}}>{{$order_status['3']}}</option>
                        @endif
                    </select>
                        
                    <button type="submit" class="fa fa-refresh"></button>
                </form>
                
            </td>
            
        </tr>
        @endforeach
            
        
    </tbody>
</table>
{{ $order_by_date->links() }}
@endif
@if (!empty($order_by_status))
<table id="product-list" class="table table-bordered table-hover table-striped">
    <thead class="bg-info">
        <tr>
            <th>#</th>
            <th>Order Code</th>
            <th>Name Customer</th>
            <th>Order Date</th>
            <th>view order detail</th>
            <th>Order Status</th>
            <th>Update Status</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($order_by_status as $key => $od)
        <tr>    
            <td>{{$key+1}}</td>
            <td>{{$od->id}}</td>
            <td>{{$od->name}}</td>
            <td>{{$od->order_date}}</td>
            <td><a href="{{ route('seller.order-customer.order_detail',$od->id) }}">view order detail</a></td>
            <td>{{$od->status}}</td>
            <td>
                
                <form action="{{ route('seller.order-customer.update_status_order', $od->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <select name="status" class="form-control">
                        @if(!empty($order_status))
                            <option value="{{$order_status['0']}}" {{$order_status['0'] == $od->status ? 'selected' : ''}}>{{$order_status['0']}}</option>
                            <option value="{{$order_status['1']}}" {{$order_status['1'] == $od->status ? 'selected' : ''}} >{{$order_status['1']}}</option>
                            <option value="{{$order_status['2']}}" {{$order_status['2'] == $od->status ? 'selected' : ''}}>{{$order_status['2']}}</option>
                            <option value="{{$order_status['3']}}" {{$order_status['3'] == $od->status ? 'selected' : ''}}>{{$order_status['3']}}</option>
                        @endif
                    </select>
                        
                    <button type="submit" class="fa fa-refresh"></button>
                </form>
                
            </td>
            
        </tr>
        @endforeach
            
        
    </tbody>
</table>
{{ $order_by_status->links() }}
@endif


@if(!empty($orders))
<div class="row">
    <span>Order total: <b>{{$order_total}}</b></span>&emsp;
    <span>Order pending: <b>{{$order_pending}}</b></span>&emsp;
    <span>Order shipping: <b>{{$order_shipping}}</b></span>&emsp;
    <span>Order completed: <b>{{$order_completed}}</b></span>&emsp;
    <span>Order cancelled: <b>{{$order_cancelled}}</b></span>&emsp;
</div>
<table id="product-list" class="table table-bordered table-hover table-striped">
    <thead class="bg-info">
        <tr>
            <th>#</th>
            <th>Order Code</th>
            <th>Name Customer</th>
            <th>Order Date</th>
            <th>view order detail</th>
            <th>Order Status</th>
            <th>Update Status</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($orders as $key => $od)
        <tr>    
            <td>{{$key+1}}</td>
            <td>{{$od->id}}</td>
            <td>{{$od->name}}</td>
            <td>{{$od->order_date}}</td>
            <td><a href="{{ route('seller.order-customer.order_detail',$od->id) }}">view order detail</a></td>
            <td>{{$od->status}}</td>
            <td>
                
                <form action="{{ route('seller.order-customer.update_status_order', $od->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <select name="status" class="form-control">
                        @if(!empty($order_status))
                        <option value="{{$order_status['0']}}" {{$order_status['0'] == $od->status ? 'selected' : ''}}>{{$order_status['0']}}</option>
                        <option value="{{$order_status['1']}}" {{$order_status['1'] == $od->status ? 'selected' : ''}} >{{$order_status['1']}}</option>
                        <option value="{{$order_status['2']}}" {{$order_status['2'] == $od->status ? 'selected' : ''}}>{{$order_status['2']}}</option>
                        <option value="{{$order_status['3']}}" {{$order_status['3'] == $od->status ? 'selected' : ''}}>{{$order_status['3']}}</option>
                        @endif
                    </select>
                        
                    <button type="submit" class="fa fa-refresh"></button>
                </form>
                
            </td>
            
        </tr>
        @endforeach
            
        
    </tbody>
</table>
{{ $orders->links() }}
@endif
@endsection