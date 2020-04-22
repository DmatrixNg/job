@extends('layouts.app')
@section('title', "Admin dashboard")
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


 <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Hi! {{request()->user()->name}} <br>Welcome to Your Dashboard</h1>
      <p class="lead"></p>
    </div>
  </div>

  <!-- Featured Section Start -->
  <section class="pt-4 bg-white">
    <div class="container">
      <div class="row text-center">
        <div class="col-12" data-aos="zoom-in">

          <div class="heading mb-50">
            <h2>Your Task</h2>
            <hr class="line bw-2 mx-auto line-sm mb-5">
            <hr class="line bw-2 mx-auto">
          </div>
      </div>
      </div>
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
        </div>

</div>
</div>
</div>
</div>
</div>

<div class="container pt-5">
  <div class="row text-center">
    <div class="col-12" data-aos="zoom-in">

      <div class="heading mb-50">
        <h2>Open Tasks</h2>
        <hr class="line bw-2 mx-auto line-sm mb-5">
        <hr class="line bw-2 mx-auto">
      </div>
    </div>
  </div>
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
</section>
@endsection
