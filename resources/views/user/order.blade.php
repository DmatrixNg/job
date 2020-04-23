@extends('layouts.app')
@section('title', "My Orders")
@section('content')
<div class="header-space"></div>
<nav class="breadcrumb-area bg-dark bg-6 ptb-70">
  <div class="container d-md-flex">
    <h2 class="text-white mb-0">Your Oders</h2>
    <ol class="breadcrumb p-0 m-0 bg-dark ml-auto">
      <li class="breadcrumb-item"><a href="/">Home</a> <span class="text-white">/</span></li>
      <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a> <span class="text-white">/</span></li>
      <li aria-current="page" class="breadcrumb-item active">Your Orders</li>
    </ol>
  </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
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
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <form id="form" class="form-control" action="{{URL('/pay/checkout')}}" method="get">


  @foreach($order as $value)
  @php
  $request = \App\Request::where('orderId',$value->id)->first();
   //dd($order);

@endphp


      <tr>
        <td>
          @php
            $products = unserialize($value->order);
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
        <td>{{$value->type}}</td>
        <td>{{$value->location}}
        <br>
        @if(isset($request->status) && $request->status == "ready")
        <br>
        <strong>Please be at this location</strong>
        @endif
      </td>
        <td>{{$value->cost - 150}}</td>
        <td>
@if(isset($request->status) && $request->status == "open")
          <p>Item Open and Awaiting pickup</p>
          <a href="{{URL('/')}}/cancel?id={{$request->id}}" class="btn btn-danger">Cancel Request</a>
@endif

@if(isset($request->status) && $request->status == "accepted")
<a href="#" class="btn btn-warning">Item Accepted and Undergoing Process</a>
@endif

@if(isset($request->status) && $request->status == "ready")
<a href="#" class="btn btn-success">Successful</a>
<p>Your Pickup code</p>
<h1>{{$request->pickup_code}}</h1>
<a href="{{URL('/')}}/done?id={{$request->id}}" class="btn btn-success">Click here, Received Item</a>
@endif
</td>
      </tr>

@endforeach

</form>
<tbody>
</table>
  </div>
</div>
</div>
</div>
</div>
</div>

@endsection
