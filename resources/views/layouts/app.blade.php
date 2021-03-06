<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("title")</title>
    <!-- Web Application Manifest -->
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('style.css')}}">

    <!-- Modernizer JS -->
    <script src="{{asset('assets/js/vandor/modernizr-3.5.0.min.js')}}"></script>
    <style media="screen">
      .invalid-feedback {
        display: inline;
      }
    </style>
</head>
<body>
    <div id="app">
        <!-- Preloader Start -->
        <div id="fadeout" class="loader w-100 h-100 position-absolute">
          <div class="h-100 d-flex justify-content-center align-items-center">
            <div class="one circle"></div>
            <div class="two circle"></div>
          </div>
        </div>
        <!-- Preloader End -->

        <!-- Header Start -->
        <header class="position-fixed w-100">
          <nav id="active-sticky" class="navbar navbar-light navbar-expand-lg">
            <div class="container">
              <a class="navbar-brand" href="{{ url('/')}}"><img src="{{asset('assets/img/logo.png')}}" alt="rnr"></a>
              <button class="navbar-toggler navber-toggler-right" data-toggle="collapse" data-target="#navbarToggler">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto">

                  @if(Gate::allows('admin'))
                  <li class="nav-item">
                    <a href="{{ url('/stores')}}" class="nav-link">Stores</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/product_categories')}}" class="nav-link">Product categories</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/track_delivery')}}" class="nav-link">Track delivery</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/all_groceries')}}" class="nav-link">All groceries</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/restaurants')}}" class="nav-link">Restaurants</a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ url('/admin')}}" class="nav-link">Enter Dashboard</a>
                  </li>

                  @endif
                  @if(Gate::allows('dispatcher'))
                    <li class="nav-item">
                      <a href="{{ url('/dispatcher')}}" class="nav-link">Enter Dashboard</a>
                    </li>

                    @else
                    @auth
                    <li class="nav-item">
                      <a href="{{ url('/stores')}}" class="nav-link">Stores</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('/product_categories')}}" class="nav-link">Product categories</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('/track_delivery')}}" class="nav-link">Track delivery</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('/all_groceries')}}" class="nav-link">All groceries</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('/restaurants')}}" class="nav-link">Restaurants</a>
                    </li>

                    <li class="nav-item">
                      <a href="{{ url('/help_desk')}}" class="nav-link">Help desk</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('/checkout')}}" class="nav-link">
                      <img width="30" src="{{asset('download.png')}}" alt=""><span id="count" cart="@if(json_decode(\Cookie::get('cart'), true)){{count(json_decode(\Cookie::get('cart'), true))}}@endif" class="badge badge-pill badge-danger">@if(json_decode(\Cookie::get('cart'), true)){{count(json_decode(\Cookie::get('cart'), true))}}@endif</span> </a>
                    </li>
                    @endauth
                  @endif

                </ul>



                @guest
                <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                  <a href="{{ url('/stores')}}" class="nav-link">Stores</a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/product_categories')}}" class="nav-link">Product categories</a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/track_delivery')}}" class="nav-link">Track delivery</a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/all_groceries')}}" class="nav-link">All groceries</a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/restaurants')}}" class="nav-link">Restaurants</a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('/help_desk')}}" class="nav-link">Help desk</a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/checkout')}}" class="nav-link">
                  <img width="30" src="{{asset('download.png')}}" alt=""><span id="count" cart="@if(json_decode(\Cookie::get('cart'), true)){{count(json_decode(\Cookie::get('cart'), true))}}@endif" class="badge badge-pill badge-danger">@if(json_decode(\Cookie::get('cart'), true)){{count(json_decode(\Cookie::get('cart'), true))}}@endif</span> </a>
                </li>

              </ul>

                  <div class="pl-20">
                        <a class="btn btn-sm btn-primary rounded" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </div>
                    @if (Route::has('register'))
                      <div class="pl-20">
                            <a <a class="btn btn-sm btn-primary rounded" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </div>
                    @endif
                    @else
                      <div class="pl-20">

                      <a class="btn btn-sm btn-primary rounded" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                  </div>

                @endguest

              </div>
            </div>
          </nav>
        </header>
        <!-- Header End -->
        <main class="mt-3">
          @yield('content')
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- JS Files -->
    <script src="{{asset('assets/js/vandor/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    <script>
    const a = jQuery.noConflict();

    function AddCart(store, p_id, action) {

      url = "{{ url('/add_cart')}}";
      a.ajax({
        url: url,
        type: "Get",
        data: {
          store: store,
          product: p_id,
          action: action
        },
        dataType: "json",
        beforeSend: function() {
          let intcount = a('#count').attr('cart');
          if (action == 1) {
            let count = ++intcount;
            a('#count').html(count);
            a('#count').attr('cart', count);
            // console.log(a('#product-' + p_id));
            a('#product-' + p_id).toggleClass('btn-danger');

            a('#product-' + p_id).attr('onclick', 'AddCart('+store+','+p_id +',0)');
            a('#product-' + p_id).html('Remove Item');
          }
          if (action == 0) {
            let count = --intcount;
            a('#count').html(count);
            if (count==0) {
              a('#count').html('');
            }
            a('#count').attr('cart', count);
            a('#product-' + p_id).removeClass('btn-danger');
            a('#product-' + p_id).attr('onclick', 'AddCart('+store+','+p_id +',1)');
            a('#product-' + p_id).html('Add to Cart');
          }
        },

      })
      .then(
        function(data) {

          // console.log(data);

        });

      }
    </script>
    <script>
    $.ajax({
      url: "products?search=@if(request()->has('q')){{request()->q}}@endif",
      method: "Get",
      beforeSend: function() {
        $('.load-more').show();
      }
    })
    .then(
      function(data) {
        // console.log(data);
        $('#product_list').html(data);
        $('.load-more').hide();
        const link = document.querySelector('[rel = next]');

        // console.log(link);
        if (link == null) {
          $(".pagi").hide();
        }
      });


        let tag = $(".list-unstyled p input.tags");
        for (i = 0; i < tag.length; i++) {

          $(tag[i]).on("click", function () {

            tag = $(this).val();
            $(this).attr("checked", !$(this).attr("checked"))
            if ($(this).attr("checked") == 'checked') {
              var tags = new Array();
              $(".list-unstyled p input[checked=checked]").each(function() {
                tags.push($(this).val());
              });
              // $("input:checked").each(function() {
              //    data['myCheckboxes[]'].push($(this).val());
              // });
              // console.log(tags);

              $.ajax({
                url: "products?product_type="+tags,
                method: "Get",
                beforeSend: function() {
                  $('.load-more').show();
                }
              })
              .then(
              function(data) {
                console.log(data);
                $('#product_list').html(data);
                $('.load-more').hide();
                const link = document.querySelector('[rel = next]');

                // console.log(link);
                if (link == null) {
                  $(".pagi").hide();
                }
              });
            }
          });
        }
      </script>
      <script>

        function getProduct(url) {
          $.ajax({
            url: url,
            beforeSend: function() {
              $('.load-more').show();
              $('#pagination').remove();
            },
          }).done(function(data) {
            $('.load-more').hide();
            $('#product_list').html(data);
            $('#product_list').focus();
            const link = document.querySelector('[rel = next]');

            // console.log(link);
            if (link == null) {
              $(".pagi").hide();
            }
          }).fail(function() {
            alert('Product could not be loaded.');
          });
        }
        $("#next").click(function() {

          const link = document.querySelector('[rel = next]');

          // console.log(link);
          if (link !== null) {
            const url = link.href;
            getProduct(url);
          }
        });
        $("#previous").click(function() {

          const link = document.querySelector('[rel = prev]');
          // console.log(link);
          if (link !== null) {
            const url = link.href;
            getProduct(url);
          }
        });
      </script>
</body>
</html>
