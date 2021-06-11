<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> 
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/"><img src="/template_home/img/logo.png"></a></li>
                    <li><a href="{{ route('product.list') }}">All Phone</a></li>
                   @foreach ($categories as $key => $category)
                   <li><a href="{{ route('show', $category->id) }}">{{$category->name}}</a></li>
                   @endforeach 
                   
                    
                    <li>
                    <form action="{{ route('search') }}" id="header_search_form" method="get">
                        <input type="text" value="{{ request()->get('name') }}" name="name" class="search_input" placeholder="Search Item" required="required">
                        <button type="submit"><img src="/template_home/img/search.png" alt=""></button>
                    </form>
                    </li>
                    <li></li>
                    <li><a href="{{ route('login') }}" class="fa fa-user">{{Auth::user() != null ? 'hi: '. Auth::user()->name  : 'Log in' }} </a></li>
                    <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">{{Auth::user() != null ? '' : 'Register'}}</a></li>
                    @php
                    $cartNumber = 0;
                    if (Session::has('carts')) {
                        foreach (Session::get('carts') as $key => $value) {
                            $cartNumber += intval($value['quantity']);
                        }
                    }
                    @endphp
                    <li><a href="{{ route('cart.cart-info') }}">Cart -  <i class="fa fa-shopping-cart"></i> <span class="product-count">{{$cartNumber}}</span></a></li>
              
                    
                </ul>
                
            </div>  
            
        </div>
        
    </div>
</div>