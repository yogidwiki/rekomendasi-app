@extends('layouts.landingpage')

@section('css')
  <!-- Demo styles -->
  <style>

    .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .swiper-pagination-bullet-active{
      background-color: #659384;
    }
    .swiper-button-next, .swiper-button-prev{
      color: #659384;
      font-size: 10px;
    }

    
    .card-about{
      width: 280px;
      border-radius:24px;
      background-image: linear-gradient(to bottom, #28765B, #2f6444);
      border-bottom:3px solid yellow;
      color: white;
      
      transition: .3s ease-in;
    }
    .card-about:hover{
      
      background-image: linear-gradient(to bottom, #328f6f, #1a3626);
    }

    .text-aqua {
    color: #00BFFF; 
    }


    .card-image{
      overflow: hidden; margin: 0 auto; border-radius: 50%; width: 100px; height: 100px; 
      border: 1px solid yellow;
    }
  </style>
@endsection
@section('content')
<div class="container my-5 py-5">
  <h2 class="text-center fw-bold my-4 text-aqua">
      ABOUT US
  </h2>
  <div class="row d-flex justify-content-between align-items-center gap-5">
      <div class="col-md-6 p-4 shadow rounded">
          <h3 class="fw-semibold text-aqua">Visi</h3>
          <p>Menjadi platform rekomendasi makanan balita yang terpercaya dan terkemuka, mendukung pertumbuhan dan perkembangan optimal balita melalui pilihan makanan sehat, bergizi, dan bervariasi yang sesuai dengan kebutuhan gizi</p>
      </div>
      <div class="col-md-5">
          <img src="{{ asset('/image/Group 65.png')}}" style="width: 80%" alt="gambar utama" class="img-fuild rounded">
      </div>
  </div>
  <div class="row d-flex justify-content-between align-items-center gap-5 mb-5">
    <div class="col-md-6 p-4 shadow rounded order-1 order-md-2">
        <h3 class="fw-semibold text-aqua">misi</h3>
        <p>Menggunakan teknologi kecerdasan buatan untuk menyediakan rekomendasi makanan balita yang akurat dan personal, dengan informasi nutrisi terpercaya, alat bantu perencanaan menu, konten edukatif, komunitas pendukung, serta menjamin keamanan dan kualitas makanan, sambil terus berinovasi dan berkembang.</p>
    </div>
    <div class="col-md-5 order-2 order-md-1">
        <img src="{{ asset('/image/Group 66.png')}}" style="width: 80%" alt="gambar utama" class=" img-fuild rounded float-end">
    </div>
</div>
  <div class="container">
  </div>
</div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
                      
    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            loop:true, // Menampilkan 1 kartu pada tampilan awal
            breakpoints: {
                768: {
                    slidesPerView: 3 // Menampilkan 3 kartu ketika lebar layar >= 768px
                }
            },
            autoplay: {
                delay: 1000, // Menentukan durasi antara perpindahan slide dalam milidetik (misalnya, 3000ms = 3 detik)
            },
            pagination: {
                el: ".swiper-pagination",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endsection