@extends('layouts.landingpage')
@section('css')
@section('content')
<div class="2   container-fluid">
  <nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid">
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">RAISING KIDS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">PREGNANCY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">KINDRED</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">FAMILY LIFE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">STAYING HEALTHY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">STARTING A FAMILY</a>
          </li>
      </div>
    </div>
  </nav>
  <div class="container my-5">
    <h1 class="text-center"> <i class="bi bi-arrow-right"></i>Family life</h1>
    <div class="row d-flex justify-content-center mb-5">
      <div class="col-md-3 ">
        <img src="{{asset('image/image7.png')}}" style="width: 100%" alt="" />
      </div>
      <div class="col-md-7">
        <span>Kategori</span>
        <h1>Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet. </h1>
        <p>
          Lorem ipsum dolor sit amet,
        </p>
      </div>
      <hr class="mt-5">
    </div>


  </div>



  @endsection