@extends('layouts.app')

@section('content')
<div class="header-space"></div>
<nav class="breadcrumb-area bg-dark bg-6 ptb-70">
  <div class="container d-md-flex">
    <h2 class="text-white mb-0">Product page</h2>
    <ol class="breadcrumb p-0 m-0 bg-dark ml-auto">
      <li class="breadcrumb-item"><a href="/">Home</a> <span class="text-white">/</span></li>
      <li class="breadcrumb-item"><a href="{{url('/store')}}">Store</a> <span class="text-white">/</span></li>
      <li aria-current="page" class="breadcrumb-item active"></li>
    </ol>
  </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
      <div class="card">

          <div class="card-body">
                    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4">

                    <div id="wrapper" class="col-md-8">

                    	<h2>Add Product</h2>

                      @if(session('message'))
                    <span role="alert" style="padding:3px; text-align:center">
                      <strong>{{ session('message') }} </strong>
                    </span>
                    @endif

                      <form method="POST" action="{{ route('addproduct') }}" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="vendorId" value="{{$store->id}}">

                       <fieldset>
                       <div class="form-group row">
                         <label for="" class="col-sm-4 col-form-label">Product Name</label>
                         <div class="col-sm-8">
                           <input type="text" class="form-control" name='product_name' value=''>
                         </div>
                       </div>
                       <div class="form-group row">

                           <label for="" class="col-sm-4 col-form-label">Product Picture</label>
                         <div class="col-sm-8">
                     <label class="custom-file">
                       <input type="file" id="file2"  name="product_pic" accept="image/*" onchange="preview_image(event,1)" value='' class="form-control">
                       <span class="custom-file-control"></span>
                     </label>
                   <img id="output_image1" width="300" height="auto"/>
                   </div></div>

                     <div class="form-group row">
                       <label for="" class="col-sm-4 col-form-label">Product Price</label>
                       <div class="input-group col-sm-8">
                         <span class="input-group-addon badge-success" id="basic-addon1">N</span>
                         <input type="text" class="form-control" name='product_price' aria-describedby="basic-addon1" value=''>
                   <span class="input-group-addon badge-success">.00</span>
                       </div>
                       </div>

                       <div class="form-group row">
                         <label for="" class="col-sm-4 col-form-label">About Product</label>
                         <div class="col-sm-8">
                           <textarea class="form-control" name='product_full_desc' rows='5'></textarea>
                         </div>
                         </div>


                       <div class="form-group row">
                         <label for="" class="col-sm-4 col-form-label">Product type</label>
                         <div class="col-sm-8">

                             <input class="form-control" name='product_type' list="product_type"  value='<?php if(isset($error)){ echo $_POST['product_type'];}?>'>
                     <datalist id="product_type">
                       <option value="Food">
                       <option value="Wears">
                       <option value="Things">
                       <option value="Services">
                       <option value="Others">
                     </datalist>
                         </div>
                         </div>
                    		<button type="submit" class="btn btn-primary" name='submit' value='Submit'>Submit</button>

                   </fieldset>
                    	</form>

                   </div></main>

    </div></div>
</div></div>
@endsection
