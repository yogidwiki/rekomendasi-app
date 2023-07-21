@extends('layouts.landingpage')

@section('css')
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

  <!-- Demo styles -->
  <style>
    html,
    body {
      position: relative;
      height: 100%;
    }

    body {

      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
    }

    .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #99f0a4;
      display: flex;
      border-radius: 32px;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .btn-about{
      background-color: #659384;
    }
    .swiper-pagination-bullet-active{
      background-color: #659384;
    }
    .swiper-button-next, .swiper-button-prev{
      color: #659384;
    }
  </style>
@endsection
@section('content')
    <div class="container py-5" >
        <div class="row d-flex justify-content-center align-items-center gap-5">
            <div class="col-md-5 p-4 shadow rounded text-start ">
                <h2 class="fw-bold">Our Vision</h2>
                <p class="text-start">At web parenting, we envision a digital landscape where children can explore the internet confidently, harnessing it’ss vast potential while staying protected from potential risks. We believe in fostering open communication, promoting digital literacy, and encouraging responsible online behavior, creating a nurturing environment where children can thrive online.</p>

            </div>
            <div class="col-md-5">
                <img src="{{asset('/image/Group 65.png')}}" style="width: 80%" alt="hero image" class="img-fuild rounded">

            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center gap-5">
            <div class="col-md-5">
                <img src="{{asset('/image/Group 66.png')}}" style="width: 80%" alt="hero image" class="img-fuild rounded">

            </div>
            <div class="col-md-5 p-4 shadow rounded">
                <h2 class="fw-bold">Our Process</h2>
                <p class="text-justify">At web parenting, we are committed to staying at the forefront of web parenting best practices. Our content is regulary update to reflect the everchanging digital landscape, ensuring that you receive the most relevant and accurate information.</p>

        </div>
        <div class="d-flex justify-content-center">
            <h3 class="fw-bold">Meet Our team</h3>
        </div> 
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-center align-items-center h-100">
                      
                        <!-- Swiper -->
                        <div class="swiper mySwiper">
                          <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card mx-5 my-5 p-3" style="width: 15rem; border-top:15px solid #659384">
                                    <img src="{{asset('/image/cipung.png')}}" class="card-img-top" alt="..." >
                                    <div class="card-body">
                                      <h5 class="card-title">Cipung</h5>
                                      <p>Full Stack</p>
                                      <a href="#" class="btn btn-secondary btn-about">Go somewhere</a>
                                    </div>
                                  </div>
                                  <div class="card mx-5 my-5 p-3" style="width: 15rem; border-top:15px solid #659384">
                                    <img src="{{asset('/image/cipung.png')}}" class="card-img-top" alt="..." >
                                    <div class="card-body">
                                      <h5 class="card-title">Cipung</h5>
                                      <p>Full Stack</p>
                                      <a href="#" class="btn btn-secondary btn-about">Go somewhere</a>
                                    </div>
                                  </div>
                                  <div class="card mx-5 my-5 p-3" style="width: 15rem; border-top:15px solid #659384">
                                    <img src="{{asset('/image/cipung.png')}}" class="card-img-top" alt="..." >
                                    <div class="card-body">
                                      <h5 class="card-title">Cipung</h5>
                                      <p>Full Stack</p>
                                      <a href="#" class="btn btn-secondary btn-about">Go somewhere</a>
                                    </div>
                                  </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card mx-5 my-5 p-3" style="width: 15rem; border-top:15px solid #659384">
                                    <img src="{{asset('/image/cipung.png')}}" class="card-img-top" alt="..." >
                                    <div class="card-body">
                                      <h5 class="card-title">Cipung</h5>
                                      <p>Full Stack</p>
                                      <a href="#" class="btn btn-secondary btn-about">Go somewhere</a>
                                    </div>
                                  </div>
                                  <div class="card mx-5 my-5 p-3" style="width: 15rem; border-top:15px solid #659384">
                                    <img src="{{asset('/image/cipung.png')}}" class="card-img-top" alt="..." >
                                    <div class="card-body">
                                      <h5 class="card-title">Cipung</h5>
                                      <p>Full Stack</p>
                                      <a href="#" class="btn btn-secondary btn-about">Go somewhere</a>
                                    </div>
                                  </div>
                                  <div class="card mx-5 my-5 p-3" style="width: 15rem; border-top:15px solid #659384">
                                    <img src="{{asset('/image/cipung.png')}}" class="card-img-top" alt="..." >
                                    <div class="card-body">
                                      <h5 class="card-title">Cipung</h5>
                                      <p>Full Stack</p>
                                      <a href="#" class="btn btn-secondary btn-about">Go somewhere</a>
                                    </div>
                                  </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card mx-5 my-5 p-3" style="width: 15rem; border-top:15px solid #659384">
                                    <img src="{{asset('/image/cipung.png')}}" class="card-img-top" alt="..." >
                                    <div class="card-body">
                                      <h5 class="card-title">Cipung</h5>
                                      <p>Full Stack</p>
                                      <a href="#" class="btn btn-secondary btn-about">Go somewhere</a>
                                    </div>
                                  </div>
                                  <div class="card mx-5 my-5 p-3" style="width: 15rem; border-top:15px solid #659384">
                                    <img src="{{asset('/image/cipung.png')}}" class="card-img-top" alt="..." >
                                    <div class="card-body">
                                      <h5 class="card-title">Cipung</h5>
                                      <p>Full Stack</p>
                                      <a href="#" class="btn btn-secondary btn-about">Go somewhere</a>
                                    </div>
                                  </div>
                                  <div class="card mx-5 my-5 p-3" style="width: 15rem; border-top:15px solid #659384">
                                    <img src="{{asset('/image/cipung.png')}}" class="card-img-top" alt="..." >
                                    <div class="card-body">
                                      <h5 class="card-title">Cipung</h5>
                                      <p>Full Stack</p>
                                      <a href="#" class="btn btn-secondary btn-about">Go somewhere</a>
                                    </div>
                                  </div>
                            </div>
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