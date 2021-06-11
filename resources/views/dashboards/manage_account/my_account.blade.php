@extends('dashboards/layouts.master')
@section('title', 'My Account')
@section('content')
{{ Session::get('mess') }}

<h1>My account</h1>
<div class="container">
    <div class="main-body">
    
        <div class="row gutters-sm">
            
            <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Name</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{Auth::user()->name}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{Auth::user()->email}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{Auth::user()->phone}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Birthday</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{Auth::user()->birthday}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{Auth::user()->address}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-12">
                        <a class="btn btn-info " href="{{ route('edit_account') }}">Edit</a>
                        <a class="btn btn-danger " href="{{ route('change_password') }}">Change password</a>
                      </div>
                    </div>
                  </div>
                </div>
             </div>
         

        </div>  
    
          
    </div>
@endsection