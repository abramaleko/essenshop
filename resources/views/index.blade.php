<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ROVIGA</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <script src="js/fontawesome.js" defer></script> <!--font icons-->

        <!-- Styles -->
       <link href="css/app.css" rel="stylesheet">
       <link href="css/index.css" rel="stylesheet">
       <link href="css/nav.css" rel="stylesheet">
       
       <!--Scripts -->
    <style>
/* [1] The container */
.img-hover-zoom {
  overflow: hidden; /* [1.2] Hide the overflowing of child elements */
}

/* [2] Transition property for smooth transformation of images */
.img-hover-zoom img {
  transition: transform .5s ease;
}

/* [3] Finally, transforming the image when container gets hovered */
.img-hover-zoom:hover img {
  transform: scale(1.2);
}
      </style>
    </head>
    <body>
            <nav class="navbar navbar-expand-md navbar-light fixed-top">
            <!-- Brand -->
            <a class="navbar-brand" href="/">R o v i g a</a>
          
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link " href="/">Home</a>
                </li>
             <!-- Dropdown -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                  Shop 
                </a>
                <div class="dropdown-menu">
                 <a class="dropdown-item" href="/product/category/Electronic gadgets">Electronic gadgets</a>
                   <a class="dropdown-item" href="/product/category/Electronic spares">Electronic spares</a>
                    <a class="dropdown-item" href="/product/category/Clothing" >Clothing</a>
                    <a class="dropdown-item" href="/product/category/Furniture">Furniture</a>
                     <a class="dropdown-item" href="/product/category/Cosmetics">Cosmetics</a>
                      <a class="dropdown-item" href="/product/category/Ornaments">Ornaments</a>
                </div>
              </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
                </li>
               </ul>
 
              <div class="has-search ml-auto">
              <form class="form-inline" action="{{route('search')}}" method="POST">
                  @csrf
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control mr-sm-2" name="search"  aria-label="Search"  style="width: 50% !important;">
                <button type="submit" class="btn btn-outline-info" id="search">Search</button>
                </form>
              </div>
              @if (Auth::check())
               <!--checks if user is loged in shows cartbadge and logout button-->
               <div class="cartbadge" id="cartbadge">
                 <a href="/cart">
                <i class="fas fa-shopping-cart"></i>
              <span class="badge badge-danger" id="badge">{{$cartbadge}}</span>
                 </a>
              </div>
             <a href="{{route('logout')}}" class="btn btn-outline-primary" 
             onclick="event.preventDefault();
             document.getElementById('logout-form').submit();"> Log out</a>
              @else
             <a href="{{route('login')}}" class="btn btn-outline-primary"><i class="far fa-user"></i>&nbsp;&nbsp;Log In</a>
              @endif
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
              </div>
          </nav> 

          <div id="demo" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('images/clothes.jpg')}}" alt="clothing"  class="d-block">
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/electronics.jpg')}}" alt="Electronics"  class="d-block">
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/furniture.jpg')}}" alt="furniture"  class="d-block">
              </div>
            </div>
            
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
          
          <!--products-->
          <div class="container allProducts">
            <div class="latest">
              <p id="latest">Latest products</p>
            </div>
            <div class="products my-5">
              <div class="row">
            @if (count($products)>0)
            @foreach ($products as $product)
                <div class="col-md-3 product img-hover-zoom">
                  <a href="/product/{{$product->id}}">
                  <img src="{{asset('storage/'.$product->image_path)}}">
                  <div class="product-name">
                  <span>{{$product->name}}</span>
                  </div>
                  <div class="price">
                  <span id="old-price">{{$product->old_price}}</span>
                  <span id="new-price">{{$product->new_price}} Tshs</span>
                  </div>
                  </a>
                </div>
            @endforeach
        @endif
             </div>
          </div>
          </div>

          <div class="container-fluid quotefield">
          
            <div class="col-md-12">
              <!--<span id="quote">We are here serve you with the best</span>-->
            </div>
          </div>
          <div class="container-fluid" style="background-color: #262626; color:white;">
             <div class="row footer">
              <div class="col-md-4">
                <p id="projectname">Roviga</p>
                <p id="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
              <div class="col-md-4">
                <p id="socialmedia">Find us on social media</p>
                <div class="social-icons">
                  <p class="icons"><i class="fab fa-instagram"></i>&nbsp;&nbsp;Follow us on Instagram</p>
                  <p class="icons"><i class="fab fa-facebook-square"></i>&nbsp;&nbsp;Like us on Facebook</p>
                  <p class="icons"><i class="fab fa-twitter"></i>&nbsp;&nbsp;Follow us on Twitter</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="info">
                  <p id="Contact">Contact Us</p>
                  <div class="social-icons">
                    <p class="icons"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Dar es Salaam,Tanzania</p>
                    <p class="icons"><i class="fas fa-phone"></i>&nbsp;&nbsp;+255 744 646 524</p>
                    <p class="icons"><i class="fas fa-envelope"></i>&nbsp;&nbsp;info@roviga.co.tz</p>
                  </div>
               </div>
              </div>
            </div>
          </div>
              <div class="copyright" style="background-color: #262626; color:white;">
                <span>Roviga&copy;2020.All rights reserved</span>
              </div>
    </body>
        <script src="js/app.js"> </script>
    <script>
    $('.carousel').carousel({
      interval: 4000
    })
  </script>
</html>