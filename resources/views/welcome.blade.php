@extends('layouts.landingpage')

@section('content')
    <style>
        .article-img img{
            border-radius: 16px;
        }
        .img-container {
            background-image: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0)), url('{{ asset('image/cipung.png') }}');
            background-size: cover;
            background-posisition: center;

            border-radius: 32px;
        }

        .img-container2 {

            border-radius: 32px;
            width: 50%;
            height: 300px;
            background-image: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0)), url('{{ asset('image/cipung.png') }}');
            background-size: cover;
            background-posisition: center;
        }

        .img-container3 {
            border-radius: 32px;
            width: cipung00%;
            height: cipung00%;
            background-image: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0)), url('{{ asset('image/cipung.png') }}');
            background-size: cover;
            background-posisition: center;
        }

        .isi-content {
            margin-top: 350px;
        }

        .isi-content2 {
            margin-top: 230px;
            color: white;
        }

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


        .swiper-pagination-bullet-active {
            background-color: #659384;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #659384;
            font-size: 10px;
        }
        .card-fitur {
            color: rgb(33, 33, 33);
            box-shadow: rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px, rgba(17, 17, 26, 0.1) 0px 24px 80px;
            border: none;
            overflow: hidden;
            transition: .3s ease-in-out;
            border-radius: 18px;
            cursor: pointer;
            
        }

        .card-fitur:hover{
            background: linear-gradient(to right, #52b678, #268340);
            color: white;
            transform: scale(1.05);
            font-size: 16px;
        }

        .card-article{
            transition: .3s ease-in-out;
        }
        .card-article:hover{
            transform: scale(1.05);
            font-size: 16px;
            box-shadow: none;
        }
        .card-why {
            color: rgb(33, 33, 33);
            border: none;
            overflow: hidden;
            transition: .3s ease-in-out;
            border-radius: 18px;
            cursor: pointer;
            
        }

        .card-why:hover{
            background-color: #5dd485;
            
            box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
            color: white;
            font-size: 16px;
        }

    </style>
    <section style="height: 100px"></section>
    <section class="my-5">
        <div class="container  d-flex justify-content-between align-items-center">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-8">
                    <h5 class="fw-semibold ">Welcome to ParentApp! </h5>
                    <h1 style="font-size:50px;" class="fw-bold text-success">Parenting Path: Nurturing Futures, One Step at a Time
                    </h1>
                    <p class="lh-base">Creating Stronger Bonds, Raising Exceptional Children . Lorem ipsum dolor sit amet
                        consectetur
                        adipisicing elit. Qui fuga commodi quibusdam quo. Culpa nobis placeat quia, velit maxime iure!</p>
                    <a href="{{ route('about') }}" class="btn mt-3 btn-login px-5 mb-3">About us</a>
                </div>
                <div class="col-md-4 ">
                    <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded" width="100%">
                </div>
            </div>
        </div>
    </section>
    

    {{-- FEATURE --}}
    <section class="py-5 my-5" style="background-color:#C2D2C5; border-radius:32px; ">
        <div class="container">
            <div class="row d-flex flex-column align-items-center justify-content-center py-3">
                <div class="col-md-5">

                    <h2 class="text-center fw-bold text-success">Our Services</h2>
                </div>
                <div class="col-md-5 text-center">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam </p>
                </div>
            </div>

            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-3 mb-3">
                    <div class="card text-center card-fitur p-3 border-0 shadow">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded-circle" width="30%">
                        </div>
                        <div class="feature-content">
                            <h4 class="fw-semibold my-3">Fitur Utama</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod ligula id eros gravida, </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-center card-fitur p-3 border-0 shadow">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded-circle" width="30%">
                        </div>
                        <div class="feature-content">
                            <h4 class="fw-semibold my-3">Fitur Utama</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod ligula id eros gravida, </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-center card-fitur p-3 border-0 shadow">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded-circle" width="30%">
                        </div>
                        <div class="feature-content">
                            <h4 class="fw-semibold my-3">Fitur Utama</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod ligula id eros gravida, </p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    {{-- WHY --}}
    <section class=" my-5">
        <div class="container">
            <div class="row  d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded" width="100%">
                </div>
                <div class="col-md-6">
                    <span class="text-success fw-semibold">~ Lorem khj</span>
                    <h1 class="text-success fw-bold mb-3">
                        Why Parent-app ?
                    </h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur, modi similique animi
                        maiores quia facilis ex velit voluptates </p>
                    <div class="mb-2 card-why d-flex align-items-center justify-content-center gap-3 ">
                        <div class="col-md-2">
                            
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded" width="100%">
                        </div>
                        <div class="col-md-10 pt-3">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem doloremque ratione aliquid pariatur libero fuga? Lorem ipsum, </p>
                        </div>
                    </div>
                    <div class="mb-2 card-why d-flex align-items-center justify-content-center gap-3 ">
                        <div class="col-md-2">
                            
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded" width="100%">
                        </div>
                        <div class="col-md-10 pt-3">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem doloremque ratione aliquid pariatur libero fuga? Lorem ipsum, </p>
                        </div>
                    </div>
                    <div class="mb-2 card-why d-flex align-items-center justify-content-center gap-3 ">
                        <div class="col-md-2">
                            
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded" width="100%">
                        </div>
                        <div class="col-md-10  pt-3">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem doloremque ratione aliquid pariatur libero fuga? Lorem ipsum, </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ARTICLES --}}
    <section class="my-5 ">
        <div class="container">
            <div class="row d-flex flex-column align-items-center justify-content-center py-3">
                <div class="col-md-5">

                    <h2 class="text-center fw-bold text-success">New Articles</h2>
                </div>
                <div class="col-md-5 text-center">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam </p>
                </div>
            </div>
            <div class="row d-flex-justify-content-center">
                <div class="col-md-3 mb-3">
                    <div class="card-article card border-0 p-3 shadow">
                        <div class="article-img">
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" width="100%">
                        </div>
                        <div class="article-content mt-3">
                            <h5 class="fw-semibold">Title Lorem ipsum dolor sit amet.</h5>
                            
                            <span class="badge rounded-pill text-bg-success text-white px-3 py-1 mb-2" >Category</span>
                        </div>
                        <div class="d-flex align-items-center gap-3 ">
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" width="20%">
                            <div class="flex-column mt-3">
                                
                            <span class="fw-semibold">Hifni Sadboyyyy</span>
                            <p class="text-secondary small">13 Agustus 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card-article card border-0 p-3 shadow">
                        <div class="article-img">
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" width="100%">
                        </div>
                        <div class="article-content mt-3">
                            <h5 class="fw-semibold">Title Lorem ipsum dolor sit amet.</h5>
                            
                            <span class="badge rounded-pill text-bg-success text-white px-3 py-1 mb-2" >Category</span>
                        </div>
                        <div class="d-flex align-items-center gap-3 ">
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" width="20%">
                            <div class="flex-column mt-3">
                                
                            <span class="fw-semibold">Hifni Sadboyyyy</span>
                            <p class="text-secondary small">13 Agustus 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card-article card border-0 p-3 shadow">
                        <div class="article-img">
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" width="100%">
                        </div>
                        <div class="article-content mt-3">
                            <h5 class="fw-semibold">Title Lorem ipsum dolor sit amet.</h5>
                            
                            <span class="badge rounded-pill text-bg-success text-white px-3 py-1 mb-2" >Category</span>
                        </div>
                        <div class="d-flex align-items-center gap-3 ">
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" width="20%">
                            <div class="flex-column mt-3">
                                
                            <span class="fw-semibold">Hifni Sadboyyyy</span>
                            <p class="text-secondary small">13 Agustus 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card-article card border-0 p-3 shadow">
                        <div class="article-img">
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" width="100%">
                        </div>
                        <div class="article-content mt-3">
                            <h5 class="fw-semibold">Title Lorem ipsum dolor sit amet.</h5>
                            
                            <span class="badge rounded-pill text-bg-success text-white px-3 py-1 mb-2" >Category</span>
                        </div>
                        <div class="d-flex align-items-center gap-3 ">
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" width="20%">
                            <div class="flex-column mt-3">
                                
                            <span class="fw-semibold">Hifni Sadboyyyy</span>
                            <p class="text-secondary small">13 Agustus 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="text-center">

                <button class="btn btn-login mt-5">
                    All Articles
                </button>
            </div>
        </div>
    </section>
    {{-- TESTIMONI --}}
    <section class="py-5" style="background-color: #C2D2C5">
        <div class="container">
            <div class="row d-flex flex-column align-items-center justify-content-center py-3">
                <div class="col-md-5">

                    <h2 class="text-center fw-bold mt-4 text-success">Testimonials </h2>
                </div>
                <div class="col-md-2">
                    <hr style="border-width: 2px;" >
                </div>
                <div class="col-md-7 text-center">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam repudiandae molestiae voluptatibus a! Nihil vero </p>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center align-items-center h-100">

                    <!-- Swiper -->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide py-5">
                                <div class="card-testimonial p-4">
                                    <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid img-testimonial" width="30%">
                                    <h5 class="fw-semibold mt-3">Cipung</h5>
                                    <p class="fs-6">
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 1st star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 2nd star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 3rd star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 4th star -->
                                        <i class="bi bi-star-half text-warning"></i> <!-- 5th star -->
                                    </p>
                                    
                                    <i class="bi bi-chat-quote-fill text-danger fw-semi-bold"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. At distinctio exercitationem rerum alias non
                                    <i class="bi bi-chat-quote-fill text-danger fw-semi-bold"></i>
                                </div>
                                
                            </div>
                            <div class="swiper-slide py-5">
                                <div class="card-testimonial p-4">
                                    <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid img-testimonial" width="30%">
                                    <h5 class="fw-semibold mt-3">Cipung</h5>
                                    <p class="fs-6">
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 1st star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 2nd star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 3rd star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 4th star -->
                                        <i class="bi bi-star-half text-warning"></i> <!-- 5th star -->
                                    </p>
                                    
                                    <i class="bi bi-chat-quote-fill text-danger fw-semi-bold"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. At distinctio exercitationem rerum alias non
                                    <i class="bi bi-chat-quote-fill text-danger fw-semi-bold"></i>
                                </div>
                                
                            </div>
                            <div class="swiper-slide py-5">
                                <div class="card-testimonial p-4">
                                    <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid img-testimonial" width="30%">
                                    <h5 class="fw-semibold mt-3">Cipung</h5>
                                    <p class="fs-6">
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 1st star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 2nd star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 3rd star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 4th star -->
                                        <i class="bi bi-star-half text-warning"></i> <!-- 5th star -->
                                    </p>
                                    
                                    <i class="bi bi-chat-quote-fill text-danger fw-semi-bold"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. At distinctio exercitationem rerum alias non
                                    <i class="bi bi-chat-quote-fill text-danger fw-semi-bold"></i>
                                </div>
                                
                            </div>
                            <div class="swiper-slide py-5">
                                <div class="card-testimonial p-4">
                                    <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid img-testimonial" width="30%">
                                    <h5 class="fw-semibold mt-3">Cipung</h5>
                                    <p class="fs-6">
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 1st star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 2nd star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 3rd star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 4th star -->
                                        <i class="bi bi-star-half text-warning"></i> <!-- 5th star -->
                                    </p>
                                    
                                    <i class="bi bi-chat-quote-fill text-danger fw-semi-bold"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. At distinctio exercitationem rerum alias non
                                    <i class="bi bi-chat-quote-fill text-danger fw-semi-bold"></i>
                                </div>
                                
                            </div>
                            <div class="swiper-slide py-5">
                                <div class="card-testimonial p-4">
                                    <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid img-testimonial" width="30%">
                                    <h5 class="fw-semibold mt-3">Cipung</h5>
                                    <p class="fs-6">
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 1st star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 2nd star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 3rd star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 4th star -->
                                        <i class="bi bi-star-half text-warning"></i> <!-- 5th star -->
                                    </p>
                                    
                                    <i class="bi bi-chat-quote-fill text-danger fw-semi-bold"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. At distinctio exercitationem rerum alias non
                                    <i class="bi bi-chat-quote-fill text-danger fw-semi-bold"></i>
                                </div>
                                
                            </div>
                            <div class="swiper-slide py-5">
                                <div class="card-testimonial p-4">
                                    <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid img-testimonial" width="30%">
                                    <h5 class="fw-semibold mt-3">Cipung</h5>
                                    <p class="fs-6">
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 1st star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 2nd star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 3rd star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 4th star -->
                                        <i class="bi bi-star-half text-warning"></i> <!-- 5th star -->
                                    </p>
                                    
                                    <i class="bi bi-chat-quote-fill text-danger fw-semi-bold"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. At distinctio exercitationem rerum alias non
                                    <i class="bi bi-chat-quote-fill text-danger fw-semi-bold"></i>
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
    </section>

    {{-- FORM TESTIMONI --}}
    <section>
        <div class="container py-5">
            
            <h2 class="text-center text-success fw-semibold mb-5">Submit Your Testimonial</h2>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8 card-form p-5">
                    <form action="/submit_testimonial" method="post">
                        <div class="row mb-3">
                            <label for="testimonial" class="col-sm-3 col-form-label">Testimonial</label>
                            <div class="col-sm-9">
                                <textarea name="testimonial" id="testimonial" class="form-control" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rating" class="col-sm-3 col-form-label">Rating</label>
                            <div class="col-sm-9">
                                <select name="rating" id="rating" class="form-select" required>
                                    <option value="5"><i class="bi bi-star-fill text-warning"></i> 5 stars</option>
                                    <option value="4"><i class="bi bi-star-fill text-warning"></i> 4 stars</option>
                                    <option value="3"><i class="bi bi-star-fill text-warning"></i> 3 stars</option>
                                    <option value="2"><i class="bi bi-star-fill text-warning"></i> 2 stars</option>
                                    <option value="1"><i class="bi bi-star-fill text-warning"></i> 1 star</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-login btn-success float-end">Submit Testimonial</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true, // Menampilkan 1 kartu pada tampilan awal
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
