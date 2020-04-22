@extends('layouts.app')
@section('title', "Stores")
@section('content')
<div class="header-space"></div>
<!-- Header End -->
<!-- Breadcrumb Area Start -->
<nav class="breadcrumb-area bg-dark bg-6 ptb-70">
  <div class="container d-md-flex">
    <h2 class="text-white mb-0">Track Delivery</h2>
    <ol class="breadcrumb p-0 m-0 bg-dark ml-auto">
      <li class="breadcrumb-item"><a href="/">Home</a> <span class="text-white">/</span></li>
      <li aria-current="page" class="breadcrumb-item active">Track delivery</li>
    </ol>
  </div>
</nav>
<!-- Featured Section Start -->
<section class="bg-white">
  <div class="container">
    <div class="row text-center">
      <div class="col-12" data-aos="zoom-in">
        <div class="row">

        <div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30">

        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30" style="padding:30px">
          <form class="input-group text-center" method="get" action="#">
            <input class="form-control" type="text" name="track" placeholder="Enter Track Code">
            <div class="input-group-append">
              <button type="submit" class="input-group-text"><i class="ti-search"></i></button>
            </div>
          </form>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30">

        </div>
      </div>
        <div class="heading mb-50">
          <h2>Track Delivery</h2>
          <hr class="line bw-2 mx-auto line-sm mb-5">
          <hr class="line bw-2 mx-auto">
        </div>
      </div>
    </div>
    <div class="row text-center">
<div class="col-12">
<a href="/my_orders" class="btn bg-primary"> View Your Order</a>
  <?php
  $status = \App\Request::where('pickup_code', request()->track)->first();
  // dump($status->status);
  ?>
  @if(isset(request()->track) && is_null($status))
  <h4>Incorrect tracking code </stong>"{{request()->track}}"</strong></h4>

  @endif
  @if(isset($status))
  <h4>Tracking status of {{request()->track}}</h4>
  <div class="progress" style="height:25px">
    @if(isset($status) && $status->status == "open")
    <div class="progress-bar bg-warning" role="progressbar" style="width: 35%;font-size:18px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Item Collected</div>

    @endif
    @if(isset($status) && $status->status == "accepted")
    <div class="progress-bar bg-warning" role="progressbar" style="width: 35%;font-size:18px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Item Collected</div>
    <div class="progress-bar bg-info" role="progressbar" style="width: 35%;font-size:18px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Processing Item</div>

    @endif
    @if(isset($status) && $status->status == "ready")

    <div class="progress-bar bg-warning" role="progressbar" style="width: 35%;font-size:18px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Item Collected</div>
    <div class="progress-bar bg-info" role="progressbar" style="width: 35%;font-size:18px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Processing Item</div>
    <div class="progress-bar bg-primary" role="progressbar" style="width: 30%;font-size:18px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Ready to deliver</div>
    @endif
</div>
@endif
</div>
        </div>
      </div>
    </section>
@endsection
