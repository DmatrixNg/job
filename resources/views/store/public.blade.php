@extends('layouts.app')
@section('title', "Stores")
@section('content')
<!-- Featured Section Start -->
<section class="section-ptb bg-white">
  <div class="container">
    <div class="row text-center">
      <div class="col-12" data-aos="zoom-in">
        <div class="row">

        <div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30">

        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30" style="padding:30px">
          <form class="input-group text-center" action="search">
            <input class="form-control" type="text" placeholder="Search..">
            <div class="input-group-append">
              <button type="submit" class="input-group-text"><i class="ti-search"></i></button>
            </div>
          </form>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30">

        </div>
      </div>
        <div class="heading mb-50">
          <h2>Stores</h2>
          <hr class="line bw-2 mx-auto line-sm mb-5">
          <hr class="line bw-2 mx-auto">
        </div>
      </div>
    </div>
    <a href="/store" class="btn bg-primary"> Create store </a>
    <br>
    <div class="row text-center">
          @foreach($stores as $store)
          <div class="col-12 col-md-6 col-lg-3 mb-sm-30 mb-md-30" data-aos="zoom-in">
            <div class="card featured-item">
              <div class="card-body ptb-45">
                <div class="icon circle-icon mb-30 mx-auto">
                  <img src="{{\Illuminate\Support\Str::replaceFirst('/home/codtufbi/job.codtrix.com/job/public/', '',$store->logo)}}" alt="">
                </div>
                <h5>{{$store->name}}</h5>
                <p class="mb-20">{{$store->des}}</p>
                <a class="item-link link-btn" href="{{url('/stores')}}/p/{{$store->slug}}">Enter Store</a>
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
