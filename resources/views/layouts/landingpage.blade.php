<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>rekomendasi_makanan</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('./css/app.css') }}">
    @yield('css')
</head>

<body>
    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light nav-parent fixed-top">
        <div class="container">
            <img src="{{ asset('image/logo.png') }}" style="max-width: 100px; height: auto;" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto ">
                    <li class="nav-item">
                        <a class="nav-link nav-menu {{ request()->is('/') ? '' : '' }}"
                            href="{{ route('welcome') }}">Home</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link nav-menu {{ request()->is('/rekomendasi') ? '' : '' }}"
                                href="{{ route('rekomendasi.index') }}">menu Rekomendasi</a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link nav-menu {{ request()->is('/history') ? '' : '' }}"
                            href="{{ route('history') }}">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-menu {{ request()->is('artikel') ? 'menu-active' : '' }}"
                            href="{{ route('artikel') }}">Articles</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link nav-menu {{ request()->is('anak') ? 'menu-active' : '' }}"
                                href="{{ route('anak') }}">Anak</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link nav-menu {{ request()->is('jadwal-imunisasi') ? 'menu-active' : '' }}"
                                href="{{ route('jadwal-imunisasi') }}">jadwal imunisasi</a>
                        </li> --}}
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link nav-menu {{ request()->is('about') ? 'menu-active' : '' }}"
                            href="{{ route('about') }}">About Us</a>
                    </li>
                </ul>
                <ul class="navbar-nav gap-3">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" onclick="markAllAsRead()">
                                    Notifikasi
                                    @if ($notifications->whereNull('read_at')->count() > 0)
                                        <span
                                            class="badge bg-danger">{{ $notifications->whereNull('read_at')->count() }}</span>
                                    @endif
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @forelse ($notifications->whereNull('read_at') as $notification)
                                        <li>
                                            <a class="dropdown-item" href="#">{{ $notification->message }}</a>
                                        </li>
                                    @empty
                                        <li><a class="dropdown-item" href="#">Tidak ada notifikasi</a></li>
                                    @endforelse
                                </ul>
                            </li>
                            @if (Auth::user()->is_Admin == 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/home') }}">Dashboard</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="fw-bold nav-link btn-login px-4" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="fw-bold nav-link btn-login px-4" href="{{ route('login') }}">Log In</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="fw-bold nav-link btn-register nav-menu"
                                        href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- End Navbar-->

    @yield('content')
    <div id="loading-spinner" class="loading-spinner">
        <div class="spinner"></div>
    </div>
    <!-- Footer -->
    <footer class="border-top mt-5">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8 text-center">
                    <img src="{{ asset('image/logo.png') }}" class="mt-4" style="max-width: 300px; height: auto;"
                        alt="">


                    <ul class="list-inline text-aqua">
                        <li class="list-inline-item ">
                            <a href="#" class="nav-link" target="_blank"><i
                                    class="bi bi-facebook"></i></i></a>
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
                    <a href="#" class="nav-link mb-3 text-aqua">&copy; 2024 Sistem Pemilihan Makanan Balita.
                        Semua
                        hak dilindungi</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Bootstrap JS (Place this at the end of the body) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        function markAllAsRead() {
            fetch('/notifications/read-all', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        document.querySelector('#navbarDropdown .badge').remove();
                    }
                });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable();
        });
    </script>
    @if ($errors->any())
        <script>
            let errorMessages = '';
            @foreach ($errors->all() as $error)
                errorMessages += "{{ $error }}\n";
            @endforeach

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: errorMessages,
            });
        </script>
    @endif

    @if (session('success') || session('error'))
        <script>
            $(document).ready(function() {
                var successMessage = "{{ session('success') }}";
                var errorMessage = "{{ session('error') }}";

                if (successMessage) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: successMessage,
                    });
                }

                if (errorMessage) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMessage,
                    });
                }
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#searchButton').click(function() {
                searchArticles();
            });

            $('#searchInput').keyup(function(event) {
                if (event.keyCode === 13) {
                    searchArticles();
                }
            });

            function searchArticles() {
                var searchQuery = $('#searchInput').val();

                $.ajax({
                    url: '{{ route('article.search') }}',
                    method: 'GET',
                    data: {
                        query: searchQuery
                    },
                    beforeSend: function() {
                        $('#searchResults').html(`
                    <div class="d-flex justify-content-center">
                      <p class="mx-3">Tunggu...  </p>
                        <div class="spinner"></div>
                    </div>`);
                    },
                    success: function(response) {
                        if (response.trim()) {
                            $('#articleList').hide(); // Hide the previous article list
                            $('#searchResults').html(response); // Show the search results
                        } else {
                            $('#articleList').show(); // Show the previous article list
                            $('#searchResults').empty(); // Clear the search results
                        }
                    },
                    error: function() {
                        $('#searchResults').html(
                            '<p class="text-center text-danger">Gaboleh kosong bang!</p>');
                    }
                });
            }
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>


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
