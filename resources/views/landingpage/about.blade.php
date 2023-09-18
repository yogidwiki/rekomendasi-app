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

    .card-image{
      overflow: hidden; margin: 0 auto; border-radius: 50%; width: 100px; height: 100px; 
      border: 1px solid yellow;
    }
  </style>
@endsection
@section('content')
<div class="container my-5 py-5">
  <h2 class="text-center fw-bold my-4 text-success">
      TENTANG KAMI
  </h2>
  <div class="row d-flex justify-content-between align-items-center gap-5">
      <div class="col-md-6 p-4 shadow rounded">
          <h3 class="fw-semibold text-success">Visi Kami</h3>
          <p>Di Eduparent, kami membayangkan lanskap digital di mana anak-anak dapat menjelajahi internet dengan percaya diri, mengoptimalkan potensinya, sambil tetap terlindungi dari risiko potensial. Kami percaya dalam memupuk komunikasi terbuka, meningkatkan literasi digital, dan mendorong perilaku online yang bertanggung jawab, menciptakan lingkungan yang mendukung pertumbuhan anak-anak di dunia maya.</p>
      </div>
      <div class="col-md-5">
          <img src="{{ asset('/image/Group 65.png')}}" style="width: 80%" alt="gambar utama" class="img-fuild rounded">
      </div>
  </div>
  <div class="row d-flex justify-content-between align-items-center gap-5 mb-5">
    <div class="col-md-6 p-4 shadow rounded order-1 order-md-2">
        <h3 class="fw-semibold text-success">Proses Kami</h3>
        <p>Di Eduparent, kami berkomitmen untuk tetap berada di garis depan praktik-praktik terbaik dalam pendidikan anak di era digital. Konten kami secara berkala diperbarui untuk mencerminkan perubahan terus-menerus dalam lanskap digital, memastikan Anda menerima informasi yang paling relevan dan akurat. Lorem ipsum dolor sit amet consectetur adipisicing elit. A, quo. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, cum?</p>
    </div>
    <div class="col-md-5 order-2 order-md-1">
        <img src="{{ asset('/image/Group 66.png')}}" style="width: 80%" alt="gambar utama" class=" img-fuild rounded float-end">
    </div>
</div>

  <div class="d-flex justify-content-center pt-5">
      <h3 class="fw-bold">Meet Our Team</h3>
  </div>
  <div class="container">
      <div class="row">
          <div class="col d-flex justify-content-center align-items-center h-100">
              <div class="swiper mySwiper">
                  <div class="swiper-wrapper">
                      @foreach ($members as $item)
                      <div class="swiper-slide">
                          <div class="card my-5 p-3 card-about">
                              <div class="p-1 card-image">
                                  <img src="{{ asset('/images/' . $item->image) }}" class="img-fluid" alt="..." style="object-fit: cover; width: 100%; height: 100%; border-radius: 50%;">
                              </div>
                              <div class="card-body">
                                  <h4 class="fw-semibold 3" style="margin-bottom: 5px;"> {{ $item->nama }}</h4>
                                  <p class="" style="margin-top: -5px; font-size:12px;">~ Full Stack</p>
                                  <p style="font-size: 14px;" >Lorem ium dolor sit amet consectetur adipisicing elit. Rem, quod? </p>
                                  <span class="card opacity-75 p-2 rounded fw-semibold" style="font-size:14px;" >{{$item->email}}</span>
                                  <div class="d-flex justify-content-center mt-3 gap-3">
                                      <a href="{{$item->linkedin}}" class="nav-link"> <i class="bi bi-linkedin "></i></a>
                                      <a href="{{$item->github}}" class="nav-link"> <i class="bi bi-github"></i></a>
                                      <a href="{{$item->instagram}}" class="nav-link"> <i class="bi bi-instagram"></i></a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @endforeach
                  </div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-pagination"></div>
              </div>
          </div>
      </div>
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