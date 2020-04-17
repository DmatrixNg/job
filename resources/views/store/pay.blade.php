@extends('layouts.app')
@section('title', "Payment")
@section('content')
<div class="header-space"></div>
<!-- Header End -->
<!-- Breadcrumb Area Start -->
<nav class="breadcrumb-area bg-dark bg-6 ptb-70">
  <div class="container d-md-flex">
    <h2 class="text-white mb-0">Payment</h2>
    <ol class="breadcrumb p-0 m-0 bg-dark ml-auto">
      <li class="breadcrumb-item"><a href="/">Home</a> <span class="text-white">/</span></li>
      <li aria-current="page" class="breadcrumb-item active">Pay</li>
    </ol>
  </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="padding:30px">
            <div class="card" style="padding:30px">
                <div class="card-header"></div>
                <div class="card-body">
	<div class="row">
                    @if(\App\Request::firstWhere('orderId',$data->id))

<h1>Your Tracking Code: {{\App\Request::firstWhere('orderId',$data->id)->pickup_code}} </h1>

                    @else

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
                            <th>Type</th>
                            <th>Cost</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- <form id="form" action="/pay" method="post"> -->

                        @php
                          $cost = [];
                          $products = unserialize($data->order);
//dd($data);
                        @endphp
                    @foreach($products as $id)
                    @php
                  $product = \App\Product::firstWhere('id',$id['product_id']);
                //  dd($product->product_name);
                $array = [
                'cost' => $product->product_price
                ];
                  array_push($cost,$array);
                    @endphp
                    <tr class="product">
                      <td>{{$product->product_name}}</td>
                      <input type="hidden" name="type[]" value="{{$product->product_type}}">
                      <td>N <span>{{$product->product_price}}</span></td>
                      <input class="eachtotal" type="hidden" name="cost[]" value="{{$product->product_price}}">
                      <td>N <span id="eachtotal" value='{{$product->product_price}}'>{{$product->product_price}}</span></td>
                    </tr>
                  @endforeach
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><i>Delivery charges:</i>
                    </td>
                    <td></td>
                    <td>
                      N100
                  </td>
                  </tr>
                  <tr>

                    <td><i>Site charges:</i>
                    </td>
                    <td></td>
                    <td>  N50 </td>

                      </tr>

                  <tr>
                    <td></td>
                    <td>Total</td>
                    @php
                    $total = collect($cost)->sum('cost');
                    //dd($total);

                    @endphp
                    <input class="total" type="hidden" name="tcost" value="{{$data->cost}}">
                    <td>N<span>{{$data->cost}}</span></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>


                 <a href="{{URL("/")}}/pay/test?id={{$data->id}}" class="bn btn-primary"> Pay test</a>
                  </td>
                  </tr>
                  <!-- </form> -->
                  <tbody>
                  </table>
                  <a href="{{URL('contact-us')}}">For Reviews, Complains, Request Contact us</a>
                    </div>

</div>
</div>
</div>
</div>
@endif
@if(\App\Request::firstWhere('orderId',$data->id))
@else
<div class="col-md-4" style="padding:30px">
  <div class="card">

      <div class="card-header">Summary</div>
      <div class="card-body">

        total: <span class="total" value="{{$total}}">{{$data->cost}}</span>
      </div>
    </div>
</div>
@endif
</div>
</div>




@endsection
