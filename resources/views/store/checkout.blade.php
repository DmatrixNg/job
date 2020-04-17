@extends('layouts.app')
@section('title', "Checkout")
@section('content')
<div class="header-space"></div>
<!-- Header End -->
<!-- Breadcrumb Area Start -->
<nav class="breadcrumb-area bg-dark bg-6 ptb-70">
  <div class="container d-md-flex">
    <h2 class="text-white mb-0">Checkout</h2>
    <ol class="breadcrumb p-0 m-0 bg-dark ml-auto">
      <li class="breadcrumb-item"><a href="/">Home</a> <span class="text-white">/</span></li>
      <li aria-current="page" class="breadcrumb-item active">Checkout</li>
    </ol>
  </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="padding:30px">
            <div class="card" style="padding:30px">
                <div class="card-header">Confirm Order</div>
                <div class="card-body" >
	<div class="row">
  <div class="table-responsive">

                      <table class="table table-striped table-sm">
                        <thead>
                          <tr>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Cost</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(session('message'))
                          <!-- <?php //dd(session('message')) ?> -->
                        <span role="alert" style="padding:3px; text-align:center">
                          <strong class="text-danger">{{ session('message') }} </strong>
                        </span>
                        @endif
                          @if(is_null(Auth::user()->address))
                          @else
                          <form id="form" action="/pay/pay" method="post">
                            @endif
                            @csrf

                        @php
                          $cost = [];

                        @endphp
                    @foreach(json_decode(\Cookie::get('cart'), true) as $id)
                    <?php //dd($id['product']) ?>
                    @php
                    $product = \App\Product::firstWhere(['id' => $id['product'], 'vendorId' => $id['store']]);
                    //dd($product);
                    $newcost = array_push($cost, ['cost' => $product->product_price]);

                    @endphp
                    <tr class="product">
                      <td>{{$product->product_name}}</td>
                      <td><img src="{{$product->product_pic}}" alt="" height="100" width="100"></td>
                      <input type="hidden" name="product[]" value="{{$id['product']}}">
                      <input type="hidden" name="type[]" value="{{$product->product_type}}">
                      <td >N <span id="itemcost{{$id['product']}}" cost="{{$product->product_price}}">{{$product->product_price}}</span></td>
                      <td>
                        <input type="number" class="form-control"name="quantity" id="each{{$id['product']}}" onchange="cal({{$id['product']}})" max="10" min='1' value="1">
                      </td>
                      <input class="eachtotal{{$id['product']}}" type="hidden" name="cost[]" value="{{$product->product_price}}">
                      <td>N <span id="eachtotal{{$id['product']}}" value='{{$product->product_price}}'>{{$product->product_price}}</span></td>
                    </tr>
                  @endforeach
                  <tr class="product">
                    <td>Site charges</td>

                    <td></td>
                    <td ><i>N <span  cost="50">50.00</span></i></td>
                    <td>
                      <input type="hidden" name="quantity" max="10" min='1' value="1">
                    </td>
                    <td><i>N <span id="eachtotal" value='50'><i>50.00</i></span></td>
                  </tr>
                  <tr class="product">
                    <td>Delivery charges</td>
                    <td></td>
                    <td ><i>N <span  cost="100"><i>100.00</i></span></i></td>
                    <td>
                      <input type="hidden" name="quantity" max="10" min='1' value="1">
                    </td>
                    <td><i>N <span id="eachtotal" value='100'>100.00</span></i></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>

                    </td>
                    <td>Total</td>
                    <td></td>
                    @php

                    $total = collect($cost)->sum('cost');

                    @endphp
                    <input class="total" type="hidden" name="tcost" value="{{$total+150}}">
                  <td>N<span class="total" value="{{$total+150}}"><h5>{{$total+150}}</h5></span></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>

                  </td>
                  </tr>

                  <tbody>
                  </table>
                    </div>


</div>
</div>
<?php //dd(Auth::user()->profile()->first()->hostel) ?>
@if(is_null(Auth::user()->address))
<div class="card">
  <div class="card-header">{{ __('Set Default Location') }}</div>

  <div class="card-body">
    <form method="POST" action="{{ route('Deflocation') }}">
      @csrf


      <div class="form-group row">
        <label for="hostel" class="col-md-4 col-form-label text-md-right">{{ __('Enter address') }}</label>

        <div class="col-md-6">

          <textarea class="form-control" name="address"></textarea>
        </div>
      </div>



<div class="form-group row mb-0">
  <div class="col-md-6 offset-md-4">
    <button type="submit" class="btn btn-primary">
      {{ __('Save Setting') }}
    </button>
  </div>
</div>
</form>
</div>
</div>
@else
<div class="card mt-2">
  <div class="card-header">{{ __('Set Delivery Location') }}</div>

  <div class="card-body">

      <div class="form-group row">
        <div class="col-md-4 col-form-label ">

        </div>
        <div class="col-md-6">
          <input type="checkbox"  name="location" value="{{Auth::user()->address}}">  <span> {{ __('Check to use Default Location') }}</span>
          <p>{{Auth::user()->address}}</p>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4 col-form-label ">

        </div>
        <div class="col-md-6">
          <span>OR</span>
        </div>
      </div>


      <div class="form-group row">
        <label for="Location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

        <div class="col-md-6">
          <input id="Location" type="text" class="form-control" name="user_location" value="{{ old('user_location') }}" placeholder="Eg: Love garden, contact no: 08150685555"></input>


        </div>
      </div>
      <!-- <div class="form-group row">
        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Business type') }}</label>

        <div class="col-md-6">
          <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" required autocomplete="new-type">
            <option value="">Choose Business type</option>
            <option value="food">Food</option>
            <option value="jewlery">Jewlery</option>
            <option value="accessories">Accessories</option>
          </select>
        </div>
      </div> -->




  </div>
</div>
@endif
<button type="submit" class="btn btn-primary">
  {{ __('Checkout') }}
</button>
</form>
<br>
<a href="{{URL('contact-us')}}">For Reviews, Complains, Request Contact us</a>
</div>
</div>
<div class="col-md-4" style="padding:30px">
  <div class="card">
      <div class="card-header">Summary</div>
      <div class="card-body">


        Total: <span class="total" value="{{$total}}">{{$total+150}}</span>
      </div>
    </div>
</div>
</div>
</div>
<script>

var initotal =  $('#total').attr('value');
// console.log(totaln);
function cal(id) {


      let intcount =  $('#each'+id).val();
      let count =  $('#itemcost'+id).attr('cost');
      let eachto = intcount * count;
      var eachtotal = Number(eachto);

      // console.log(eachtotal);
      $('#eachtotal' + id).html(eachtotal);
      $('.eachtotal' + id).val(eachtotal);
      var quantity, price, sum = 0;
      //loop through product "blocks"
      $('.product').each(function() {
        price = $(this).find('td span')[0].attributes.cost.value;
        quantity = $(this).find('td input').val();
        //Add price to sum if number
        if (!isNaN(price) && !isNaN(quantity)) {
          sum += price * quantity;
        }
      });

        $('.total').html(sum);
        $('.total').val(sum);

}

</script>
@endsection
