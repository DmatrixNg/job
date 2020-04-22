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
      <h1 class="display-4">Hi! {{request()->user()->name}} <br>Welcome to Your Stores</h1>
      <p class="lead"></p>
    </div>
  </div>

  <!-- Featured Section Start -->
  <section class="pt-4 bg-white">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <div class="heading mb-50">

      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-buyers-tab" data-toggle="pill" href="#pills-buyers" role="tab" aria-controls="pills-dispatcher" aria-selected="false">Buyers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-orders-tab" data-toggle="pill" href="#pills-orders" role="tab" aria-controls="pills-orders" aria-selected="false">orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-dispatcher-tab" data-toggle="pill" href="#pills-dispatcher" role="tab" aria-controls="pills-dispatcher" aria-selected="false">Dispatcher</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-admins-tab" data-toggle="pill" href="#pills-admins" role="tab" aria-controls="pills-admins" aria-selected="false">Administrators</a>
        </li>
      </ul>
        </div>
        </div>
    </div>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

          <div class="row text-center">
            <div class="col-12" data-aos="zoom-in">

              <div class="heading mb-50">
                <h2>Your Stores</h2>
                <hr class="line bw-2 mx-auto line-sm mb-5">
                <hr class="line bw-2 mx-auto">
              </div>
            <a href="/admin/create" class="btn bg-primary"> Create store </a>
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
                  <a class="item-link link-btn"  href="{{url('/admin/store')}}/{{$store->slug}}">Enter {{$store->name}}</a>

                </div>
              </div>
            </div>

            @endforeach

          </div>

        </div>
        <div class="tab-pane fade" id="pills-buyers" role="tabpanel" aria-labelledby="pills-buyers-tab">
          <div class="row container">
            <div class="col-12 col-md-6 col-lg-8 mb-sm-30 mb-md-30">


          <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Numbers of orders</th>

    </tr>
  </thead>
  <tbody>
    <?php $i=1 ?>
    @foreach($buyers as $buyer)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$buyer->name}}</td>
      <td>{{$buyer->orders->count()}}</td>

    </tr>
    @endforeach

  </tbody>
</table>

</div>
<div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30">
<h1>Total User: {{$buyers->count()}}</h1>
        </div>
        </div>
        </div>


        <div class="tab-pane fade" id="pills-orders" role="tabpanel" aria-labelledby="pills-orders-tab">

          <div class="col-12 col-md-6 col-lg-6 mb-sm-30 mb-md-30">

                      <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Order</th>
                  <th scope="col">Type</th>
                  <th scope="col">Location</th>
                  <th scope="col">Cost</th>
                  <th scope="col">Pay status</th>
                  <th scope="col">Pickup code</th>

                </tr>
              </thead>
              <tbody>
                <?php $i=1 ?>
                @foreach($orders as $order)
                <tr>
                  <th scope="row">{{$i++}}</th>
                  <td>
                    @php
                      $products = unserialize($order->order);
                      dd($products);
                    @endphp
                    @foreach($products as $product)
                    @php
                  $item = \App\Product::firstWhere('id',$product['product_id']);
                  //dd($product->product_name);

                    @endphp
                    <span>
                    Product Name:  {{$item->product_name}}:
                    </span>
                    <span>
                    Product Cost:  N{{$product['product_cost']}}
                    </span>
                    <br>
                    @endforeach
                  </td>
                  <td>{{$order->type}}</td>
                  <td>{{$order->location}}</td>
                  <td>N{{$order->cost}}</td>
                  <td>{{$order->pay_status}}</td>
                  <td>{{$order->pickup_code}}</td>
                </tr>
                @endforeach

              </tbody>
            </table>
        </div>
          <div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30">
        </div>

        </div>



        <!-- ///////////////////////////// -->
        <div class="tab-pane fade" id="pills-dispatcher" role="tabpanel" aria-labelledby="pills-dispatcher-tab">

          <div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30">
            <table class="table">
            <thead class="thead-light">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Request handled</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1 ?>
            @foreach($dispatchers as $dispatcher)
            <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$dispatcher->name}}</td>
            <td>{{$dispatcher->responds->count()}}</td>
            <td>@mdo</td>
            </tr>
            @endforeach

            </tbody>
            </table>
        </div>
          <div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30">
        </div>

        </div>
        <!-- ///////////////////////////// -->
        <div class="tab-pane fade" id="pills-admins" role="tabpanel" aria-labelledby="pills-admins-tab">

          <div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30">
            <table class="table">
            <thead class="thead-light">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Request handled</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1 ?>
            @foreach($admins as $admin)
            <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$admin->name}}</td>
            <td>@mdo</td>
            </tr>
            @endforeach

            </tbody>
            </table>
        </div>
          <div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30">
        </div>

        </div>

      </div>
</div>
</section>
@endsection
