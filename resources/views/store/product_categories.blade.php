@extends('layouts.app')
@section('title')
Product Categories
@endsection

@section('content')
<div class="header-space"></div>
<!-- Header End -->
<!-- Breadcrumb Area Start -->
<nav class="breadcrumb-area bg-dark bg-6 ptb-70">
  <div class="container d-md-flex">
    <h2 class="text-white mb-0">Product Categories</h2>
    <ol class="breadcrumb p-0 m-0 bg-dark ml-auto">
      <li class="breadcrumb-item"><a href="/">Home</a> <span class="text-white">/</span></li>
      <li aria-current="page" class="breadcrumb-item active">Product Categories</li>
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


                </div>
              </div>
            <div id="product_list"></div>
              <style media="screen">

                .pagi {
                  text-align: center;
                }
              </style>
              <div class="pagi">

              <span><button class="paginate btn-primary" id="previous">PREVIOUS</button></span>
              <span><button class="paginate btn-primary" id="next">NEXT </button></span>
            </div>
          <!-- Blog Posts End -->

        </section>


    </section>

</main>

    @endsection
