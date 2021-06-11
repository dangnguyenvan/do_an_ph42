@extends('dashboards/layouts.master')
@section('title', 'Edit User')
@section('content')
<h1>Edit User</h1>
{{ Session::get('error') }}
<style type="text/css">
    form{
        width: 400px;
        
    }
</style>



<form action="{{ route('admin.user.update_role',$user->id) }}" method="post" >
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" readonly name="name" placeholder="name" value="{{$user->name}}"
            class="form-control">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror    
    </div>
    <div class="form-group ">
        <label for="">Email</label>
        <input type="text" readonly name="email" placeholder="email" value="{{$user->email}}"
            class="form-control">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror    
    </div>
    <div class="form-group">
        <label for="">Phone</label>
        <input type="text" readonly name="phone" placeholder="phone" value="{{$user->phone}}"
            class="form-control">
        @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror    
    </div>
    <div class="form-group ">
        <label for="">Birthday</label>
        <input type="text" readonly name="birthday" placeholder="birthday" value="{{$user->birthday}}"
            class="form-control">
        @error('birthday')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror    
    </div>
    <div class="form-group">
        <label for="">Address</label>
        <input type="text" readonly name="address" placeholder="address" value="{{$user->address}}"
            class="form-control">
        @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror    
    </div>
    <div class="form-group">
        <label for="" >Roles</label>
        <br>
        
        
            <input type="checkbox" name="role_user" value="{{$role_id['0']}}" {{$user->hasRole($role_name['0']) ? 'checked' : ''}}>{{$role_name['0']}} <br>
            <input type="checkbox" name="role_seller" value="{{$role_id['1']}}" {{$user->hasRole($role_name['1']) ? 'checked' : ''}}>{{$role_name['1']}} <br>
            <input type="checkbox" name="role_admin" value="{{$role_id['2']}}" {{$user->hasRole($role_name['2']) ? 'checked' : ''}}>{{$role_name['2']}} <br>
        
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>

@endsection