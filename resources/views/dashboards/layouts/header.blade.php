{{-- @auth('web')
    <p>
        Welcome, {{ auth()->guard('web')->user()->name }} <br>
    In the  Dashboard.....
    </p>
    <p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </p>
@endauth --}}

{{-- @guest('admin')
    <a href="{{ route('admin.login') }}">Login</a>
@endguest --}}