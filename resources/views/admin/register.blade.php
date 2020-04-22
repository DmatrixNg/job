@extends('layouts.app')

@section('content')
<div class="header-space"></div>
<!-- Header End -->
<!-- Breadcrumb Area Start -->
<nav class="breadcrumb-area bg-dark bg-6 ptb-70">
  <div class="container d-md-flex">
    <h2 class="text-white mb-0">Sign Up</h2>
    <ol class="breadcrumb p-0 m-0 bg-dark ml-auto">
      <li class="breadcrumb-item"><a href="index.html">Home</a> <span class="text-white">/</span></li>
      <li aria-current="page" class="breadcrumb-item active">Register</li>
    </ol>
  </div>
</nav>
<!-- Login Area Start -->
<div class="section-ptb">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
        <div class="sign-form">
                    <form method="POST" class="form-group mb-0" action="{{ route('register') }}">
                        @csrf

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input class="form-control mb-25" type="text" name="name" placeholder="Name">
                        @error('age')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input class="form-control mb-25" type="date" name="age" placeholder="Age">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <textarea class="form-control mb-25" name="address" placeholder="Your Address"></textarea>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input class="form-control mb-25" type="email" name="email" placeholder="Email">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input class="form-control mb-25" type="password" name="password" placeholder="Password">
                        <input class="form-control  mb-25" type="password" name="password_confirmation" placeholder="Confirm Password">

                        <select class="form-control  mb-25" name="role" required>

                          <option value="">Choose your role</option>
                          <option value="admin">Administrator</option>
                          <option value="maintainer">Maintainer</option>
                          <option value="dispatcher">Dispatcher</option>
                        </select>

                        <button class="btn btn-primary w-100 mb-40" type="submit">Register</button>

                    </form>


                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
