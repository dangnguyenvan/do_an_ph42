@extends('dashboards/layouts.master')
@section('title', 'Change Password')
@section('content')
<h1>Change Password</h1>
{{ Session::get('error') }}

<style type="text/css">
    form{
        width: 400px;
        
    }
</style>
<form action="{{ route('update_password',Auth::user()->id) }}" method="post" >
    @csrf
    @method('PUT')
    
    <div class="form-group ">
        <label for="">Email</label>
        <input type="text" readonly name="email" placeholder="email" value="{{Auth::user()->email}}"
            class="form-control">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror    
    </div>
    <div class="form-group">
        <label for=""> New password</label>
        <input type="password" name="password" placeholder="password" value=""
            class="form-control">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror    
    </div>
    <div class="form-group">
        <label for="">Confirm Password</label>
        <input type="password" name="password_confirmation" placeholder="confirm password" value=""
            class="form-control">
        @error('password_confirm')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror    
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection