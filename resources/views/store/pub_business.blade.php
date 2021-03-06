@extends('layouts.app')
@section('title', $store->name)
@section('content')
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
    <div class="row text-center">

          <input type="hidden" name="vendorId" value="{{$store->id}}">

  @foreach($store->products()->get() as $product)
  <div class="col-12 col-md-6 col-lg-3 mb-sm-30 mb-md-30" data-aos="zoom-in">
    <div class="card featured-item">
      <div class="card-body ptb-45">
        <!-- <div class="icon circle-icon mb-30 mx-auto"> -->
          <img src="{{$product->product_pic}}"/>
        <!-- </div> -->
        <h5>{{$product->product_name}}</h5>
        <p class="mb-20">{{$product->des}}</p>
        <p class="mb-20">{{$product->product_type}}</p>
        <p class="mb-20">N{{$product->product_price}}</p>
        <?php $cart = array(
          "store" => $store->id,
   "product" => $product->id,
   "action" => "1");
// dd(in_array($cart, json_decode(\Cookie::get('cart'), true)));
   ?>
      @if(json_decode(\Cookie::get('cart'), true)
      && in_array($cart, json_decode(\Cookie::get('cart'), true)))
      <button id="product-{{$product->id}}" class="item-link link-btn btn-danger" onclick="AddCart({{ $store->id }},{{$product->id}},0)">Remove Item</a>
      @else
        <button id="product-{{$product->id}}" class="item-link link-btn" onclick="AddCart({{ $store->id }},{{$product->id}},1)">Add to Cart</a>
          @endif
      </div>
    </div>
  </div>

@endforeach

</div>
</div>
</section>

@endsection
