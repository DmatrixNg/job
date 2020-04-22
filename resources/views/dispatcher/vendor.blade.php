@extends('layouts.app')
@section('title', "Store Registration")
@section('content')
<style media="screen">


/*
* Custom translucent site header
*/

.site-header {
background-color: rgba(0, 0, 0, .85);
-webkit-backdrop-filter: saturate(180%) blur(20px);
backdrop-filter: saturate(180%) blur(20px);
}
.site-header a {
color: #999;
transition: ease-in-out color .15s;
}
.site-header a:hover {
color: #fff;
text-decoration: none;
}

/*
* Dummy devices (replace them with your own or something else entirely!)
*/

.product-device {
position: absolute;
right: 10%;
bottom: -30%;
width: 300px;
height: 540px;
background-color: #333;
border-radius: 21px;
-webkit-transform: rotate(30deg);
transform: rotate(30deg);
}

.product-device::before {
position: absolute;
top: 10%;
right: 10px;
bottom: 10%;
left: 10px;
content: "";
background-color: rgba(255, 255, 255, .1);
border-radius: 5px;
}

.product-device-2 {
top: -25%;
right: auto;
bottom: 0;
left: 5%;
background-color: #e5e5e5;
}


/*
* Extra utilities
*/

.border-top { border-top: 1px solid #e5e5e5; }
.border-bottom { border-bottom: 1px solid #e5e5e5; }

.box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }

.flex-equal > * {
-ms-flex: 1;
-webkit-box-flex: 1;
flex: 1;
}
@media (min-width: 768px) {
.flex-md-equal > * {
 -ms-flex: 1;
 -webkit-box-flex: 1;
 flex: 1;
}
}

.overflow-hidden { overflow: hidden; }
</style>
<div class="header-space"></div>

 <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Welcome to ABC store Arena</h1>
      <p class="lead">Create Your store</p>

    </div>
  </div>

   <div class="card-body text-center">
     <!-- <h3>Proceed to Your Registered Store</h3> -->
     <a href="/admin" class="btn btn-info"> <- Back to dashboard</a>
   </div>

   <div class="section-ptb">
     <div class="container">
       <div class="row">
         <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
           <div class="sign-form">
      <div class="col-sm-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

      <form method="POST" class="form-group mb-0" action="{{ route('addvendor') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="userId" value="{{Auth::user()->id}}">

            <input class="form-control mb-25" type="text" name="name" required placeholder="Store Name">
            <input class="mb-25" type="file" name="logo" value="{{ old('logo') }}">
            <textarea class="form-control" name="des" required>About Store</textarea>
            <fieldset>

            <div class="form-group row">
                <label for="type" class="col-sm-4 col-form-label">{{ __('Store type') }}</label>

                <div class="col-md-6 mt-25 mb-25">
                  <select id="type" class="form-control" name="type" required autocomplete="new-type">
                    <option value="">Choose Store type</option>
                    <option value="groceries">Groceries</option>
                    <option value="restaurants">Restaurants</option>
                    <option value="shop">Shop</option>
                    <option value="others">Others</option>
                  </select>
                </div>
            </div>


              <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                          {{ __('Register Store') }}
                      </button>
                  </div>
              </div>
      </fieldset>
         </form>
       </div>
     </div>
     </div>
     </div>
     </div>
   </div>
@endsection
