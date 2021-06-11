@extends('dashboards/layouts.master')
@section('title', 'Edit Account')
@section('content')
<h1>Edit Account</h1>
{{ Session::get('error') }}
<style type="text/css">
    form{
        width: 400px;
        
    }
</style>
<form action="{{ route('update_account',Auth::user()->id) }}" method="post" >
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" placeholder="name" value="{{Auth::user()->name}}"
            class="form-control">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror    
    </div>
    <div class="form-group ">
        <label for="">Email</label>
        <input type="text" name="email" placeholder="email" value="{{Auth::user()->email}}"
            class="form-control">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror    
    </div>
    <div class="form-group">
        <label for="">Phone</label>
        <input type="text" name="phone" placeholder="phone" value="{{Auth::user()->phone}}"
            class="form-control">
        @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror    
    </div>
    <div class="form-group ">
        <label for="">Birthday</label>
        <input type="text" name="birthday" placeholder="birthday" value="{{Auth::user()->birthday}}"
            class="form-control">
        @error('birthday')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror    
    </div>
    <div class="form-group">
        <label for="">Address</label>
        <input type="text" name="address" placeholder="address" value="{{Auth::user()->address}}"
            class="form-control">
        @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror    
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection