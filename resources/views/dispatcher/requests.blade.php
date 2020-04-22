@extends('layouts.app')
@section('title', "Request Page")
@section('content')
<div class="header-space"></div>
<!-- Header End -->
<!-- Breadcrumb Area Start -->
<nav class="breadcrumb-area bg-dark bg-6 ptb-70">
  <div class="container d-md-flex">
    <h2 class="text-white mb-0">Open Delivery</h2>
    <ol class="breadcrumb p-0 m-0 bg-dark ml-auto">
      <li class="breadcrumb-item"><a href="/">Home</a> <span class="text-white">/</span></li>
      <li aria-current="page" class="breadcrumb-item active">Open Delivery</li>
    </ol>
  </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Open Request Page</div>
                <div class="card-body">
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Product</th>
          <th>Type</th>
          <th>Location</th>
          <th>Pickup Commission</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <form id="form" class="form-control" action="{{URL('/pay/checkout')}}" method="get">


  @foreach(\App\Request::where('status',"open")->get() as $value)

      <tr>
        <td>
          @php
            $order = $value->orders;
            $products = unserialize($order->order);
            //dd($products);
          @endphp
          <?php //dump($order) ?>
          @foreach($products as $id)
          @php
        $product = \App\Product::firstWhere('id',$id['product_id']);

          @endphp
          <span>
            {{$product->product_name}}: N{{$id['product_cost']}}<br>
          </span>
        @endforeach
      </td>

        <td>{{$order->type}}</td>
        <td>{{$order->location}}</td>
        <td>N100</td>
        <td><a href="/accept?order={{$order->id}}"><button type="button" class="btn btn-danger" name="button">Pickup</button></a>  </td>

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
