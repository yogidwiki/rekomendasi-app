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
<<<<<<< HEAD
    <div class="container">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-8">
                <h5 class="fw-semibold " >Welcome to ParentApp! </h5>
                <h1 style="font-size:50px;" class="fw-bold text-success">Parenting Path: Nurturing Futures, One Step at a Time</h1>
                <p class="lh-base">Creating Stronger Bonds, Raising Exceptional Children . Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Qui fuga commodi quibusdam quo. Culpa nobis placeat quia, velit maxime iure!</p>
                <a href="#" class="btn mt-3 btn-login px-5">About us</a>
            </div>
            <div class="col-md-4 ">
                <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded" width="100%">
            </div>
        </div>
    </div>

    <section style="background-color:#C2D2C5 ">
        <div class="container py-5  my-5">
            <h4 class="text-success text-center fw-bold mb-5">Category: Top-importance articles</h4>

            <div class="row d-flex justify-content-center gap-4">
                <div class="col-md-5 img-container pt-5 text-light">
                    <div class="isi-content">
                        <span class="badge rounded-pill text-bg-warning text-white px-3 py-1">Badge</span>

                        <h2>Proses untuk Memantaskan Diri Menjadi Orang Tua Teladan</h2>
                        <p>Pola asuh sebagai sebuah proses bagaimana orang tua memperlakukan dan cara berinteraksi dengan
                            anak didalamnya meliputi aktivitas yang bersifat ...</p>
                    </div>
=======
    <section style="height: 100px"></section>
    <section class="my-5">
        <div class="container  d-flex justify-content-between align-items-center">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-8" data-aos="zoom-out-down">
                    <h5 class="fw-semibold " >Welcome to ParentApp! </h5>
                    <h1 style="font-size:50px;" class="fw-bold text-success">Parenting Path: Nurturing Futures, One Step at a Time
                    </h1>
                    <p class="lh-base">Creating Stronger Bonds, Raising Exceptional Children . Lorem ipsum dolor sit amet
                        consectetur
                        adipisicing elit. Qui fuga commodi quibusdam quo. Culpa nobis placeat quia, velit maxime iure!</p>
                    <a href="{{ route('about') }}" data-aos="fade-right" data-aos-duration="1500" class="btn mt-3 btn-login px-5 mb-3">About us</a>
>>>>>>> 5cba2a4c068923982388e6c993fedc4c0bc71a5b
                </div>
                <div class="col-md-4 ">
                    <img src="{{ asset('image/cipung.png') }}"  data-aos="zoom-in-down" alt="Hero Image" class="img-fluid rounded" width="100%">
                </div>
            </div>
        </div>
    </section>
    

    {{-- FEATURE --}}
    <section class="py-5 my-5" style="background-color:#C2D2C5; border-radius:32px; ">
        <div class="container">
            <div class="row d-flex flex-column align-items-center justify-content-center py-3"data-aos="fade-down">
                <div class="col-md-5" >

                    <h2 class="text-center fw-bold text-success">Our Services</h2>
                </div>
                <div class="col-md-5 text-center">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam </p>
                </div>
            </div>

            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-md-3 mb-3" data-aos="fade-right">
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
                <div class="col-md-3 mb-3" data-aos="fade-up">
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
                <div class="col-md-3 mb-3"data-aos="fade-left">
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
                <div class="col-md-6" data-aos="fade-up">
                    <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded" width="100%">
                </div>
                <div class="col-md-6">
                    <div  data-aos="fade-down">

                        <span class="text-success fw-semibold">~ Lorem khj</span>
                        <h1 class="text-success fw-bold mb-3">
                            Why Parent-app ?
                        </h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur, modi similique animi
                            maiores quia facilis ex velit voluptates </p>
                    </div>
                    <div class="mb-2 card-why d-flex align-items-center justify-content-center gap-3 px-3 " data-aos="fade-right">
                        <div class="col-md-2">
                            
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded" width="100%">
                        </div>
                        <div class="col-md-10 pt-3">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem doloremque ratione aliquid pariatur libero fuga? Lorem ipsum, </p>
                        </div>
                    </div>
                    <div class="mb-2 card-why d-flex align-items-center justify-content-center gap-3 px-3 " data-aos="fade-right"data-aos-delay="100">
                        <div class="col-md-2">
                            
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded" width="100%">
                        </div>
                        <div class="col-md-10 pt-3">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem doloremque ratione aliquid pariatur libero fuga? Lorem ipsum, </p>
                        </div>
                    </div>
                    <div class="mb-2 card-why d-flex align-items-center justify-content-center gap-3 px-3 "data-aos="fade-right"data-aos-delay="200">
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
            <div class="row d-flex flex-column align-items-center justify-content-center py-3"data-aos="zoom-in-up" >
                <div class="col-md-5">

                    <h2 class="text-center fw-bold text-success">New Articles</h2>
                </div>
                <div class="col-md-5 text-center">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam </p>
                </div>
            </div>
            <div class="row d-flex-justify-content-center">
                <div class="col-md-3 mb-3" data-aos="fade-up" >
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
                <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="100">
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
                <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="200">
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
                <div class="col-md-3 mb-3"data-aos="fade-up" data-aos-delay="300">
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

                <button class="btn btn-login mt-5" data-aos="fade-right">
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
                            @foreach ($testimonials as $item)
                            <div class="swiper-slide py-5">
                                <div class="card-testimonial p-4">
                                    <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid img-testimonial" width="30%">
                                    <h5 class="fw-semibold mt-3">{{$item->user->name}}</h5>
                                    <p class="fs-6">
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 1st star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 2nd star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 3rd star -->
                                        <i class="bi bi-star-fill text-warning"></i> <!-- 4th star -->
                                        <i class="bi bi-star-half text-warning"></i> <!-- 5th star -->
                                    </p>
                                    
                                    <i class="bi bi-chat-quote-fill text-danger fw-semi-bold"></i> {{$item->ulasan}}
                                    <i class="bi bi-chat-quote-fill text-danger fw-semi-bold"></i>
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
    </section>

    {{-- FORM TESTIMONI --}}
    <section>
        <div class="container py-5">
            
            <h2 class="text-center text-success fw-semibold mb-5">Submit Your Testimonial</h2>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8 card-form p-5">
                    <form action="{{ route('testimonials.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="testimonial" class="col-sm-3 col-form-label">Testimonial</label>
                            <div class="col-sm-9">
                                <textarea name="ulasan" id="testimonial" class="form-control" rows="5" required></textarea>
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
                        @if (Auth::check())
                        <button type="submit" class="btn btn-login btn-success float-end">Submit Testimoni</button>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-login btn-primary float-end" id="login-button">Submit Testimoni</a>
                    @endif

                    </form>
                </div>
            </div>
        </div>
    </section>


    


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Cek apakah tombol login ada di halaman
    const loginButton = document.getElementById('login-button');

    if (loginButton) {
        // Tambahkan event listener untuk menampilkan SweetAlert saat tombol login diklik
        loginButton.addEventListener('click', function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Peringatan',
                text: 'Anda harus login terlebih dahulu untuk mengirim testimonial.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Login',
                cancelButtonText: 'Tutup',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Arahkan pengguna ke halaman login jika tombol "Login" di klik
                    window.location.href = '{{ route('login') }}';
                }
            });
        });
    }
</script>

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
