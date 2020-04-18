@extends('layouts.app')
@section('title')
@if(request()->has('q')){{request()->q}}@endif | job
@endsection

@section('content')
<div class="header-space"></div>
<!-- Header End -->
<!-- Breadcrumb Area Start -->
<nav class="breadcrumb-area bg-dark bg-6 ptb-70">
  <div class="container d-md-flex">
    <h2 class="text-white mb-0">Search</h2>
    <ol class="breadcrumb p-0 m-0 bg-dark ml-auto">
      <li class="breadcrumb-item"><a href="/">Home</a> <span class="text-white">/</span></li>
      <li aria-current="page" class="breadcrumb-item active">Search</li>
    </ol>
  </div>
</nav>
<main class="container">
    <section class="row mx-0">
        <section class="col-lg-3 sidebar pl-0 pr-3">


                <i class="fa fa-arrow-left arrow"></i>


            <form action="">

                <div class="widget recent-post bg-white mb-30">
                  <div class="widget-title mb-15">
                    <h4 class="mb-10">Categories</h4>
                    <hr class="line bw-2">
                  </div>
                  <div class="list-unstyled">

                    <p class="tags"> <input type="checkbox" class="tags" name="tags[]" value="food" id="">food</p>
                    <p class="tags"> <input type="checkbox" class="tags" name="tags[]" id="" value="Wears">Wears</p>
                    <p class="tags"> <input type="checkbox" class="tags" name="tags[]" id="" value="Things">Things</p>
                    <p class="tags"> <input type="checkbox" class="tags" name="tags[]" id="" value="Services">Services</p>
                    <p class="tags"> <input type="checkbox" class="tags" name="tags[]" id="" value="Others">Others</p>
                  </div>
              </div>
            </form>

        </section>

        <section class="col-lg-9 main_page pl-3 pr-0">
              <div class="row text-center">
                <div class="col-12" data-aos="zoom-in">
                  <div class="row">


                  <div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30" style="padding:30px">
                    <form class="input-group text-center" action="search">
                      <input class="form-control" type="text" name="q" placeholder="Search..">
                      <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="ti-search"></i></button>
                      </div>
                    </form>
                  </div>

                </div>
                  <div class="heading mb-50">
                    <h2>Search Result for @if(request()->has('q')){{request()->q}}@endif</h2>
                    <hr class="line bw-2 mx-auto line-sm mb-5">
                    <hr class="line bw-2 mx-auto">
                  </div>
                </div>
              </div>
            <div id="movie_list"></div>
              <style media="screen">
                .paginate {
                  height: 100%;
                  width: 10%;
                  background-color: #FF5300;
                  border: 1px solid #FF5300;
                  color: #ffffff;
                  border-radius: 0 8px 8px 0;
                }
                .pagi {
                  text-align: center;
                }
              </style>
              <div class="pagi">

              <span><button class="paginate" id="previous">PREVIOUS</button></span>
              <span><button class="paginate" id="next">NEXT </button></span>
            </div>
          <!-- Blog Posts End -->

        </section>


    </section>

</main>

    @endsection
