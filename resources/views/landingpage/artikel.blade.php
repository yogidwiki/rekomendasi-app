@extends('layouts.landingpage')
@section('css')
@section('content')
<div style="height: 90px;" class="p"></div>
<div class="container-fluid">
  <nav class="navbar navbar-expand-lg bg-transparant ">
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
    <a href="{{route('detail-kategori')}}" class="nav-link">

      <h1 class="text-center mb-5 fw-bold"> Family life <i class="bi bi-arrow-right"></i></h1>
    </a>
    <div class="row d-flex justify-content-center mb-5">
      <div class="col-md-3 ">
        <img src="{{asset('image/image7.png')}}" style="width: 100%" alt="" />
      </div>
      <div class="col-md-7">
        <span>Kategori</span>

        <a href="{{route('detail-artikel')}}" class="nav-link">

          <h2 class="fw-semibold">Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet. </h2>
        </a>
        <p class="mt-4">
          Lorem ipsum dolor sit amet,
        </p>
      </div>
      <hr class="mt-5">
    </div>
    <div class="row d-flex justify-content-center mb-5">
      <div class="col-md-3 ">
        <img src="{{asset('image/image7.png')}}" style="width: 100%" alt="" />
      </div>
      <div class="col-md-7">
        <span>Kategori</span>
        <h2 class="fw-semibold">Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet. </h2>
        <p class="mt-4">
          Lorem ipsum dolor sit amet,
        </p>
      </div>
      <hr class="mt-5">
    </div>
    <div class="row d-flex justify-content-center mb-5">
      <div class="col-md-3 ">
        <img src="{{asset('image/image7.png')}}" style="width: 100%" alt="" />
      </div>
      <div class="col-md-7">
        <span>Kategori</span>
        <h2 class="fw-semibold">Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet. </h2>
        <p class="mt-4">
          Lorem ipsum dolor sit amet,
        </p>
      </div>
      <hr class="mt-5">
    </div>


  </div>



  @endsection