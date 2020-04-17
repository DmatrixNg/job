@extends('layouts.app')
@section('title', "Pickups")
@section('content')
<div class="header-space"></div>
<!-- Header End -->
<!-- Breadcrumb Area Start -->
<nav class="breadcrumb-area bg-dark bg-6 ptb-70">
  <div class="container d-md-flex">
    <h2 class="text-white mb-0">Your Pickup</h2>
    <ol class="breadcrumb p-0 m-0 bg-dark ml-auto">
      <li class="breadcrumb-item"><a href="/">Home</a> <span class="text-white">/</span></li>
      <li aria-current="page" class="breadcrumb-item active">Pickups</li>
    </ol>
  </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
  <div class="table-responsive">
    @if(session('message'))
  <span role="alert" style="padding:3px; text-align:center">
    <strong>{{ session('message') }} </strong>
  </span>
  @endif
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Product</th>
          <th>type</th>
          <th>Location</th>
          <th>cost</th>
          <th>Action</th>
          <th>Delivery Code</th>
        </tr>
      </thead>
      <tbody>
        <form id="form" class="form-control" action="{{URL('/pay/checkout')}}" method="get">


  @foreach($order as $value)
  @php
  //dd($order);
  $request = \App\Request::where('id',$value->requestId)->first();
  $order = \App\Order::where('id',$request->orderId)->first();
  $id = $order;

  @endphp


      <tr>
        <td>
          @php
            $products = unserialize($id->order);
          //  dd($products);
          @endphp
          @foreach($products as $product)
          @php
        $item = \App\Product::firstWhere('id',$product['product_id']);
        //dd($product->product_name);

          @endphp
          <span>
            {{$item->product_name}}: N{{$product['product_cost']}}
          </span>
          <br>
          @endforeach
        </td>
        <td>{{$id->type}}</td>
        <td>{{$id->location}}</td>
        <td>{{$id->cost - 150}}</td>
        <td>
@if($value->status == "open")
          <a href="/ready?order={{$value->requestId}}"><button type="button" class="btn btn-success" name="button">Ready</button></a>
        <a href="/decline?order={{$value->requestId}}"><button type="button" class="btn btn-danger" name="button">Decline</button></a>
@endif
</td>
<td>

@if($value->status == "done")
<h1>{{$id->pickup_code}}</h1>
<small>Awaiting receiver confirmation</small>
@endif
</td>

      </tr>

@endforeach

</form>
<tbody>
</table>
<a href="{{URL('contact-us')}}">For Reviews, Complains, Request Contact us</a>
  </div>
</div>
</div>
</div>
</div>
</div>

@endsection
