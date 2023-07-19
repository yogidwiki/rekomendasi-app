@extends('layouts.landingpage')

@section('content')
    <h2 class="text-center mt-5">halaman diskusi</h2> 
    <h1 class="text-center mt-5">    </h1> 
    
    <!-- First row with three buttons -->

    
    <style>
    /* Custom CSS to center the buttons */
    .centered-buttons {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 100px;
    }
    </style>

<div class="container">
    <div class="row d-flex justify-content-center mb-4">
      <div class="col-md-2" >
      <button type="button" class="btn btn-primary w-100">Starting A Family </button>
      </div>
      <div class="col-md-2">
      <button type="button" class="btn btn-primary w-100"> A Family</button>
      </div>
      <div class="col-md-2">
      <button type="button" class="btn btn-primary w-100">Starting A </button>
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col-md-2" >
      <button type="button" class="btn btn-primary w-100">Starting A Family</button>
      </div>
      <div class="col-md-2">
      <button type="button" class="btn btn-primary w-100"> A Family</button>
      </div>
      <div class="col-md-2">
      <button type="button" class="btn btn-primary w-100">Starting A </button>
      </div>
    </div>
  </div>


@endsection