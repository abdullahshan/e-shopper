<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="{{ asset('frontend/fonts/icomoon/style.css') }}">
    
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">


    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="{{ route('shop.home') }}" id="searchform" class="site-block-top-search">
                @csrf
                @method('post')
                <span class="icon icon-search2"></span>
                <input type="text" name="search_text" id="searchbutton" class="form-control border-0" placeholder="Search">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="{{ route('frontend.home') }}" class="js-logo-clone">Shoppers</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li><a href="{{ route('login') }}"><span class="icon icon-person"></span></a></li>
                  <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                  <li>
                    <a href="{{ route('cart.home') }}" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count">2</span>
                    </a>
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="active">
              <a href="{{ url('http://127.0.0.1:8000') }}">Home</a>
            </li>
            <li class="">
              <a href="{{ route('about.home') }}">About</a>

            </li>
            <li id="shop"><a href="{{ route('shop.home') }}">Shop</a></li>
            <li class="has-children">
                <a href="#">Category</a>
                <ul class="dropdown">
                 
                    @foreach ($categories as $category)
                    <li class="{{ count($category->subcategories) > 0 ? 'has-children' : '' }}">
                      <a href="#">{{ $category->name }}</a>
                        @foreach ($category->subcategories as $subcategory)
                        <ul class="dropdown">
                           <li><a href="#">{{ $subcategory->name }}</a></li>
                         </ul>
                        @endforeach
                      
                    </li>
                    @endforeach

                </ul>
              </li>
            <li><a href="{{ route('shop.home') }}">New Arrivals</a></li>
            <li><a href="{{ route('contact.home') }}">Contact</a></li>
          </ul>
        </div>
      </nav>
    </header>

   
       <div class="container" style="text-align: center">

      <ul id="searchresult"></ul>

       </div>


    @yield('content');




    <footer class="site-footer border-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
              <div class="row">
                <div class="col-md-12">
                  <h3 class="footer-heading mb-4">Navigations</h3>
                </div>
                <div class="col-md-6 col-lg-4">
                  <ul class="list-unstyled">
                    <li><a href="#">Sell online</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">Shopping cart</a></li>
                    <li><a href="#">Store builder</a></li>
                  </ul>
                </div>
                <div class="col-md-6 col-lg-4">
                  <ul class="list-unstyled">
                    <li><a href="#">Mobile commerce</a></li>
                    <li><a href="#">Dropshipping</a></li>
                    <li><a href="#">Website development</a></li>
                  </ul>
                </div>
                <div class="col-md-6 col-lg-4">
                  <ul class="list-unstyled">
                    <li><a href="#">Point of sale</a></li>
                    <li><a href="#">Hardware</a></li>
                    <li><a href="#">Software</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
              <h3 class="footer-heading mb-4">Promo</h3>
              <a href="#" class="block-6">
                <img src="{{ asset('frontend/images/hero_1.jpg') }}" alt="Image placeholder" class="img-fluid rounded mb-4">
                <h3 class="font-weight-light  mb-0">Finding Your Perfect Shoes</h3>
                <p>Promo from  nuary 15 &mdash; 25, 2019</p>
              </a>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="block-5 mb-5">
                <h3 class="footer-heading mb-4">Contact Info</h3>
                <ul class="list-unstyled">
                  <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                  <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                  <li class="email">emailaddress@domain.com</li>
                </ul>
              </div>
  
              <div class="block-7">
                <form action="#" method="post">
                  <label for="email_subscribe" class="footer-heading">Subscribe</label>
                  <div class="form-group">
                    <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                    <input type="submit" class="btn btn-sm btn-primary" value="Send">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
              <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
            
          </div>
        </div>
      </footer>
    </div>
  
    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/aos.js') }}"></script>
  
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script>


        $('#searchbutton').on('keyup', function(){


            let value = $(this).val();

                // console.log(value);

                if(value.length > 1 ){

                    $.ajax({
                    method: 'GET',
                    url: "{{ route('search.home') }}",
                    data: {search_text: value},
                    success: function(d) {
                    
                        let results = JSON.parse(d)

                        // console.log(results);

                        let posts = []

                        results.forEach(result => {

                       
                            let url = `{{ route('shop.home', ':slug') }}`;

                             url = url.replace(':slug', result.slug);


                           // console.log(url)

                        let data = `
                        <div class="row mb-5">
                        <div class="col-sm-6 col-lg-3 mb-4" data-aos="fade-up" style="margin-top:20px;margin:auto;margin-top:10px;">
                  <div class="block-4 text-center border">
                    <figure class="block-4-image">
                      <a href="{{ route('shop.home') }}"> <img style="max-height:300px;" src="{{ asset('storage/') }}/${result.image}" alt=""></a>
                    </figure>
                    <div class="block-4-text p-4">
                      <h3><a href="shop-single.html">${result.title}</a></h3>
                      <p class="mb-0">${result.description}</p>
                      <p class="text-primary font-weight-bold">${result.price}</p>
                    </div>
                  </div>
                </div>
            </div>
                            `

                        posts.push(data)
                            
                        }); 

                        $('#searchresult').html(posts)

                    },
                    error: function(error){

                        $('#searchresult').html(`<h3 style="color:red;">${error.responseText}</h3>`)

                    }

                });

                }else{

                    $('#searchresult').html('')
                }
                  
        })

</script>
      
    </body>
  </html>


