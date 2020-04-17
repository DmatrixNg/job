@extends('layouts.app')

@section('content')
<div class="header-space"></div>
<!-- Header End -->
<!-- Breadcrumb Area Start -->
<nav class="breadcrumb-area bg-dark bg-6 ptb-70">
  <div class="container d-md-flex">
    <h2 class="text-white mb-0">Help desk</h2>
    <ol class="breadcrumb p-0 m-0 bg-dark ml-auto">
      <li class="breadcrumb-item"><a href="/">Home</a> <span class="text-white">/</span></li>
      <li aria-current="page" class="breadcrumb-item active">Help desk</li>
    </ol>
  </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contact Us</div>

                <div class="card-body">
                  @if(session('message'))
                <span role="alert" style="padding:3px; text-align:center">
                  <strong>{{ session('message') }} </strong>
                </span>
                @endif
                  <form method="POST" action="{{ route('contact') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                        <fieldset>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="name" value='{{ old('name') }}' required autocomplete="name">
                        </div>
                      </div>
                      <div class="form-group row">
                          <label for="email" class="col-md-3 col-form-label">{{ __('Email') }}</label>

                          <div class="col-md-9">
                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">


                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Message</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" name="mes" value="{{ old('mes') }}" required autocomplete="mes" rows='5'></textarea>
                        </div>
                        </div>


                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Send') }}
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
@endsection
