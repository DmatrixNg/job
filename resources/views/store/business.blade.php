@extends('layouts.app')
@section('title', $store->name." product")
@section('content')
<div class="header-space"></div>
<nav class="breadcrumb-area bg-dark bg-6 ptb-70">
  <div class="container d-md-flex">
    <h2 class="text-white mb-0">Product page</h2>
    <ol class="breadcrumb p-0 m-0 bg-dark ml-auto">
      <li class="breadcrumb-item"><a href="/">Home</a> <span class="text-white">/</span></li>
      <li class="breadcrumb-item"><a href="{{url('/store')}}">Store</a> <span class="text-white">/</span></li>
      <li aria-current="page" class="breadcrumb-item active">{{$store->name}}</li>
    </ol>
  </div>
</nav>
<div class="section-ptb">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
                <div class="card-header">{{$store->name}} Product list</div>
<a href="{{URL('store/'.$store->slug)}}/addproduct" class="btn btn-primary">Add Product</a>
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
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($store->products()->get() as $product)
                                  <tr>
                                    <td>{{$product->product_name}}</td>
                                    <td><img src="{{$product->product_pic}}" alt="" height="100" width="100"> </td>
                                    <td>{{$product->product_type}}</td>
                                    <td>N{{$product->product_price}}</td>
                                    <td>product status</td>
                                    <td><p>
                                      <a href="delete/{{$product->id}}">Delete</a></p></div></div>
                                    </td>
                                  </tr>
                                  @endforeach
                            </tbody>
                            </table>
                            </div>

                </div>
            </div>
        </div>
@endsection
