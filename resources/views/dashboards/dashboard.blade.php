@extends('dashboards.layouts.master')

@section('title', '')

{{-- import file css (private) --}}
@push('css')
    
@endpush

@section('content')
<!-- Small boxes (Stat box) -->
@if(Session::has('mess'))
    <script>
        window.alert("{{ Session::get('mess') }}");
       
    </script>
 @endif   
{{-- @php
        $roles = Auth::user()->roles;
    @endphp
    @foreach ($roles as $item)
    @if ($role_name = $item->role_name == "ROLE_ADMIN")
        {{"menu admin"}}
    @elseif($role_name = $item->role_name == "ROLE_SELLER")
        {{"menu seller"}}
    @else    
        {{"menu user"}}
    @endif
    @endforeach   --}}

@endsection