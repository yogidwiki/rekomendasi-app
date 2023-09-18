@extends('layouts.landingpage')

@section('content')
<!-- JELEK -->
<div class="container min-vh-100" style="padding-top: 100px">
  
  <h1 class="text-center fw-bold text-success py-5">{{ $success }}</h1>
@if ($totalRating <= $minimumScore)
<div class="row d-flex justify-content-between align-items-center ">
  <div class="col-md-4">
    <img src="{{asset('image/Kurang.png')}}" alt="Gambar" class="img-fluid">
  </div>
  <!-- Card (kotak) di sebelah kanan -->
  <div class="col-md-7">
    <div class="card">
      <div class="card-body text-left" >
        <h3 class="card-title fw-bold text-danger">Anda Belum Siap</h3>
        <p class="card-text">
            Anda belum siap menjadi orang tua yang baik! jangan dulu menikah atau nda akan menyesal karena anak anda akan terkena mental helath karena perlakuan anda yang tidak benar dalam mendidik anak!
        </p>
      </div>
    </div>
  </div>
</div>
@elseif ($totalRating <= $maxNetralScore )
<div class="row d-flex justify-content-between align-items-center ">
      <div class="col-md-4">
        <img src="{{asset('image/Kurang.png')}}" alt="Gambar" class="img-fluid">
      </div>
      <!-- Card (kotak) di sebelah kanan -->
      <div class="col-md-7">
        <div class="card">
          <div class="card-body text-left" >
            <h3 class="card-title fw-bold text-warning">Lumayan</h3>
            <p class="card-text">
                Mungkin hari ini kamu belum mampu menjadi seorang orang tua, tapi kamu percaya bahwa dengan setiap langkahku dalam hidup ini, kamu akan terus belajar dan tumbuh untuk menjadi pribadi yang lebih baik dan lebih siap untuk mengambil peran penting sebagai seorang orang tua di masa depan. Setiap hari adalah kesempatan bagiku untuk memperkuat nilai-nilai, meningkatkan keterampilan, dan memahami arti cinta tanpa syarat. Semoga perjalanan ini membimbingku menuju saat-saat indah menjadi orang tua yang peduli, bijaksana, dan mendukung 
                anak-anakku sepenuh hati.
            </p>
          </div>
        </div>
      </div>
    </div>
@else
<div class="row d-flex justify-content-between align-items-center ">
  <div class="col-md-4">
    <img src="{{asset('image/Kurang.png')}}" alt="Gambar" class="img-fluid">
  </div>
  <!-- Card (kotak) di sebelah kanan -->
  <div class="col-md-7">
    <div class="card">
      <div class="card-body text-left" >
        <h3 class="card-title fw-bold text-primary">Sangat Siap</h3>
        <p class="card-text">
            Anda sudah sangat siap menjadi orang tua yang baik !!! Segeralah menikah agar anda cepat mendapat keturunan dan dapat mendidik anak anda sehingga ia menjadi presiden korea selatan
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