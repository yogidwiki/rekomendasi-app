@extends('layouts.landingpage')
@section('css')
    <style>
    /* CSS untuk posisi tengah horizontal dan vertikal */
    .container {
      display: flex;
      justify-content: space-around;
    }

    .center-content {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .card {
            box-shadow: rgba(0, 0, 0, 0.2) 0px 18px 50px -10px;
            border: none;
            border-radius: 18px;
            cursor: pointer;
            color: white;
            padding: 20px;
            
        }
    
    .card-title {
        padding-bottom: 5%;
    }
  </style>
@endsection
@section('content')
<!-- JELEK -->
    <div class="container my-5">
@if ($totalRating <= $minimumScore)
<div class="row center-content">
      <!-- Gambar di sebelah kiri -->
      
      <h1 class="text-center fw-bold text-success mt-5">{{ $success }}</h1>
      <h2 class="text-center fw-bold text-success">Total Score: {{ $totalRating }}</h2>
      <div class="col-md-6">
        <img src="{{asset('image/Kurang.png')}}" alt="Gambar" class="img-fluid">
      </div>
      <!-- Card (kotak) di sebelah kanan -->
      <div class="col-md-6">
        <div class="card bg-danger">
          <div class="card-body text-left" >
            <h5 class="card-title">Ternyata Anda Belum Siap</h5>
            <p class="card-text">
                Mungkin hari ini kamu belum mampu menjadi seorang orang tua, tapi kamu percaya bahwa dengan setiap langkahku dalam hidup ini, kamu akan terus belajar dan tumbuh untuk menjadi pribadi yang lebih baik dan lebih siap untuk mengambil peran penting sebagai seorang orang tua di masa depan. Setiap hari adalah kesempatan bagiku untuk memperkuat nilai-nilai, meningkatkan keterampilan, dan memahami arti cinta tanpa syarat. Semoga perjalanan ini membimbingku menuju saat-saat indah menjadi orang tua yang peduli, bijaksana, dan mendukung 
                anak-anakku sepenuh hati.
            </p>
          </div>
        </div>
      </div>
    </div>
@elseif ($totalRating <= $maxNetralScore )
<div class="row center-content">
      <!-- Gambar di sebelah kiri -->
      
      <h1 class="text-center fw-bold text-success mt-5">{{ $success }}</h1>
      <h2 class="text-center fw-bold text-success">Total Score: {{ $totalRating }}</h2>
      <div class="col-md-6">
        <img src="{{asset('image/Kurang.png')}}" alt="Gambar" class="img-fluid">
      </div>
      <!-- Card (kotak) di sebelah kanan -->
      <div class="col-md-6">
        <div class="card bg-warning">
          <div class="card-body text-left" >
            <h5 class="card-title">Ternyata Anda sedeng</h5>
            <p class="card-text">
                Mungkin hari ini kamu belum mampu menjadi seorang orang tua, tapi kamu percaya bahwa dengan setiap langkahku dalam hidup ini, kamu akan terus belajar dan tumbuh untuk menjadi pribadi yang lebih baik dan lebih siap untuk mengambil peran penting sebagai seorang orang tua di masa depan. Setiap hari adalah kesempatan bagiku untuk memperkuat nilai-nilai, meningkatkan keterampilan, dan memahami arti cinta tanpa syarat. Semoga perjalanan ini membimbingku menuju saat-saat indah menjadi orang tua yang peduli, bijaksana, dan mendukung 
                anak-anakku sepenuh hati.
            </p>
          </div>
        </div>
      </div>
    </div>
@else
<div class="row center-content">
      <!-- Gambar di sebelah kiri -->
      
      <h1 class="text-center fw-bold text-success mt-5">{{ $success }}</h1>
      <h2 class="text-center fw-bold text-success">Total Score: {{ $totalRating }}</h2>
      <div class="col-md-6">
        <img src="{{asset('image/Kurang.png')}}" alt="Gambar" class="img-fluid">
      </div>
      <!-- Card (kotak) di sebelah kanan -->
      <div class="col-md-6">
        <div class="card bg-success">
          <div class="card-body text-left" >
            <h5 class="card-title">Ternyata Anda sangat Siap</h5>
            <p class="card-text">
                Mungkin hari ini kamu belum mampu menjadi seorang orang tua, tapi kamu percaya bahwa dengan setiap langkahku dalam hidup ini, kamu akan terus belajar dan tumbuh untuk menjadi pribadi yang lebih baik dan lebih siap untuk mengambil peran penting sebagai seorang orang tua di masa depan. Setiap hari adalah kesempatan bagiku untuk memperkuat nilai-nilai, meningkatkan keterampilan, dan memahami arti cinta tanpa syarat. Semoga perjalanan ini membimbingku menuju saat-saat indah menjadi orang tua yang peduli, bijaksana, dan mendukung 
                anak-anakku sepenuh hati.
            </p>
          </div>
        </div>
      </div>
    </div>
@endif

</div>

<div class="text-center">

  <a class="btn btn-login btn-success px-3" href="{{route('page-test')}}"> Test Ulang</a>

</div>


    

@endsection