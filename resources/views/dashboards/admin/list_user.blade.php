@extends('dashboards/layouts.master')
@section('title', 'List User')
@section('content')
<h1>List User</h1> 
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@if (!empty($users))
<table id="product-list" class="table table-bordered table-hover table-striped">
    <thead class="bg-info">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Birthday</th>
            <th>Status</th>
            <th>Update Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($users as $key => $user)
        <tr>    
            <td>{{$key+1}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->birthday}}</td>
            <td>{{$user->status}}</td>
            <td>
                
                <form action="{{ route('admin.user.update_status_user', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <select name="status" class="form-control">
                        @if(!empty($active_status))
                            <option value="{{$active_status['0']}}" {{$active_status['0'] == $user->status ? 'selected' : ''}}>{{$active_status['0']}}</option>
                            <option value="{{$active_status['1']}}" {{$active_status['1'] == $user->status ? 'selected' : ''}} >{{$active_status['1']}}</option>
                            
                        @endif
                    </select>
                        
                    <button type="submit" class="fa fa-refresh"></button>
                </form>
                
            </td>
            <td><a href="{{ route('admin.user.edit_user', $user->id) }}">edit</a></td>
            
        </tr>
        @endforeach
            
        
    </tbody>
</table>
{{ $users->links() }}
@endif
@endsection