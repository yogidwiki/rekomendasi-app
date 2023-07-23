<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parenting</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('./css/app.css')}}">
    @yield('css')
</head>
<body>
    <nav class=" navbar navbar-expand-lg navbar-light nav-parent fixed-top " >
        <div class="container">
            <img src="{{asset('image/parenting-logo.jpeg')}}" style="max-width: 100px; height: auto;" alt="">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto ">
                    <li class="nav-item">
                        <a class="nav-link nav-menu  {{ request()->is('/') ? 'menu-active' : ''}}" href="{{route('welcome')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-menu {{ request()->is('diskusi') ? 'menu-active' : ''}}" href="{{route('diskusi')}}">Forum Diskusi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-menu {{ request()->is('test') ? 'menu-active' : ''}}" href="{{route('test')}}">Parenting Test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-menu {{ request()->is('artikel') ? 'menu-active' : ''}}" href="{{route('artikel')}}">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-menu {{ request()->is('about') ? 'menu-active' : ''}}" href="{{route('about')}}">About Us</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="fw-bold nav-link  btn-login px-4 mx-2" href="{{ route('login') }}">Log In</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="fw-bold nav-link btn-register nav-menu " href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    

    @yield('content')
    <div id="loading-spinner" class="loading-spinner">
        <div class="spinner"></div>
      </div>

      <footer class="border-top mt-5" >
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8 text-center">
                    <img src="{{asset('image/parenting-logo.jpeg')}}" class="mt-4" style="max-width: 300px; height: auto;" alt="">
                    
                    
                    <ul class="list-inline text-success">
                        <li class="list-inline-item ">
                            <a href="#" class="nav-link" target="_blank"><i class="bi bi-facebook"></i></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="nav-link" target="_blank"><i class="bi bi-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="nav-link" target="_blank"><i class="bi bi-instagram"></i></a>
                        </li>
                        <!-- Add more social media icons here -->
                    </ul>
                    <hr>
                    <a href="#" class="nav-link mb-3 text-success">www.parenting.com</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS (Place this at the end of the body) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.15.0/bootstrap-icons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        // Tampilkan loading spinner saat halaman dimuat
      window.addEventListener('beforeunload', function() {
          document.getElementById('loading-spinner').style.display = 'flex';
      });
      
      // Sembunyikan loading spinner setelah halaman selesai dimuat
      window.addEventListener('load', function() {
          document.getElementById('loading-spinner').style.display = 'none';
      });
      
      </script>
</body>
</html>
