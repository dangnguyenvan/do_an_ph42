<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if(Session::has('mess'))
    <script>
        window.alert("{{ Session::get('mess') }}");
       
    </script>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                    <a href="{{ route('my_order', Auth::user()->id) }}">My Order</a>
                </div>
            </div>
        </div>
    </div>
    @auth
    @php
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
    @endforeach    
    @endauth
    
    
</x-app-layout>
