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
            width:28rem;
            height: 27rem;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 18px 50px -10px;
            border: none;
            border-radius: 18px;
            cursor: pointer;
            background-color: #5dd485;
            color: white;
            padding: 22px;
            
        }
    
    .card-title {
        padding-bottom: 5%;
    }
  </style>
@endsection
@section('content')
    <div class="container">
    <div class="row center-content">
      <!-- Gambar di sebelah kiri -->
      <div class="col-md-6">
        <img src="{{asset('image/Kurang.png')}}" alt="Gambar" class="img-fluid">
      </div>
      <!-- Card (kotak) di sebelah kanan -->
      <div class="col-md-6">
        <div class="card">
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
  </div>
@endsection