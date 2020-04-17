@extends('layouts.app')

@section('content')
<div class="header-space"></div>
<!-- Header End -->
<!-- Breadcrumb Area Start -->
<nav class="breadcrumb-area bg-dark bg-6 ptb-70">
  <div class="container d-md-flex">
    <h2 class="text-white mb-0">Sign In</h2>
    <ol class="breadcrumb p-0 m-0 bg-dark ml-auto">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a> <span class="text-white">/</span></li>
      <li aria-current="page" class="breadcrumb-item active">login</li>
    </ol>
  </div>
</nav>
<!-- Breadcrumb Area End -->
<!-- Login Area Start -->
<div class="section-ptb">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
        <div class="sign-form">
                    <form method="POST" class="form-group mb-0"  action="{{ route('login') }}">
                        @csrf

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
                        <input class="form-control" type="password" name="password" placeholder="Password">
                        <div class="custom-control custom-checkbox mr-sm-2 d-flex mt-30 mb-20">
                          <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                          <label class="custom-control-label ml-2" for="remember">Remember Me</label>
                        </div>
                        <button class="btn btn-primary w-100 mb-40" type="submit">Log In</button>
                        <p class="text-center mb-0">Don't have an account? <a href="{{url('/register')}}">Register Now</a></p>

                    </form>
                  </div>
                </div>
              </div>
              </div>
              </div>
@endsection
