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
                    <li class="active"><a href="./"><img src="template_home/img/logo.png"></a></li>
                    <li><a href="shop.html">All Phone</a></li>
                    <li><a href="single-product.html">iphone</a></li>
                    <li><a href="cart.html">samsung</a></li>
                    <li><a href="#">oppo</a></li>
                    
                    <li>
                    <form action="#" id="header_search_form">
                        <input type="text" class="search_input" placeholder="Search Item" required="required">
                        <button><img src="template_home/img/search.png" alt=""></button>
                    </form>
                    </li>
                    <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a></li>
                    <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></li>
                    <li><a href="cart.html">Cart - <span class="cart-amunt">$100</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a></li>
              
                    
                </ul>
            </div>  
        </div>
    </div>
</div>