@extends('layouts.app')
@section('title', "Stores dashboard")
@section('content')
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        /* font-family: 'Nunito', sans-serif; */
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
<div class="header-space"></div>
<nav class="breadcrumb-area bg-dark bg-6 ptb-70">
  <div class="container d-md-flex">
    <h2 class="text-white mb-0">Product page</h2>
    <ol class="breadcrumb p-0 m-0 bg-dark ml-auto">
      <li class="breadcrumb-item"><a href="/">Home</a> <span class="text-white">/</span></li>
      <li class="breadcrumb-item"><a href="{{url('/store')}}">Store</a> <span class="text-white">/</span></li>
      <li aria-current="page" class="breadcrumb-item active"></li>
    </ol>
  </div>
</nav>

 <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Hi! {{request()->user()->name}} <br>Welcome to Your Stores</h1>
      <p class="lead"></p>

    </div>
  </div>

      <!-- Featured Section Start -->
      <section class="pt-4 bg-white">
        <div class="container">
          <div class="row text-center">
            <div class="col-12" data-aos="zoom-in">

              <div class="heading mb-50">
                <h2>Your Stores</h2>
                <hr class="line bw-2 mx-auto line-sm mb-5">
                <hr class="line bw-2 mx-auto">
              </div>
            </div>
          </div>
          <div class="row text-center">
            @foreach($stores as $store)
            <div class="col-12 col-md-6 col-lg-3 mb-sm-30 mb-md-30" data-aos="zoom-in">
              <div class="card featured-item">
                <div class="card-body ptb-45">
                  <div class="icon circle-icon mb-30 mx-auto">
                    <i class="ti-shield"></i>
                  </div>
                  <h5>{{$store->name}}</h5>
                  <p class="mb-20">{{$store->des}}</p>
                  <a class="item-link link-btn"  href="{{url('/store')}}/{{$store->slug}}">{{$store->name}}</a>

                </div>
              </div>
            </div>
            <!-- Single Featured End -->
            @endforeach
            <!-- <div class="col-12 col-md-6 col-lg-3 mb-sm-30 mb-md-30" data-aos="zoom-in" data-aos-delay="400">
              <div class="card featured-item">
                <div class="card-body ptb-45">
                  <div class="icon circle-icon mb-30 mx-auto">
                    <i class="ti-lock"></i>
                  </div>
                  <h5>Security included</h5>
                  <p class="mb-20">Cicero are also reproduc heir exact original form, accompanied pani da</p>
                  <a class="item-link link-btn" href="#">Read More</a>
                </div>
              </div>
            </div> -->

          </div>
        </div>
      </section>
@endsection
