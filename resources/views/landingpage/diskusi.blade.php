@extends('layouts.landingpage')

@section('content')
    <section class="my-5 py-5">
        <div class="container">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <h2 class="text-center fw-bold text-success pt-5">DISCUSSION FORUM</h2>

        <div class="container mt-4">
            <div class="row d-flex justify-content-center gap-5 mb-4">
                <div class="col-md-8 card border-0 p-5 shadow">
                    <form action="{{ route('discussions.store') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="categorySelect" class="col-sm-3 col-form-label">Pilih Kategori:</label>
                            <div class="col-sm-9">
                                <select class="form-control " id="categorySelect" name="category_id">
                                    @foreach ($categories_discussion as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="commentInput" class="col-sm-3 col-form-label">Tulis Diskusi:</label>
                            <div class="col-sm-9">
                                <textarea class="form-control " name="content" id="commentInput" style="height: 100px" rows="1"
                                    placeholder="Tell everyone what your problem is......."></textarea>
                            </div>
                        </div>
                        @if (Auth::check())
                        
                        <button type="submit" class="btn btn-success btn-login px-3 float-end mt-3">Kirim</button>
                        @else
                        
                        <button type="button" class="btn btn-success btn-login px-3 float-end mt-3" id="login-button">Kirim</button>
                        
                        @endif
                    </form>
                </div>

                <div class="col-md-3">
                    <h4 class="text-center mb-4">Categories</h4>
                    <div class="row" id="categoryContainer">
                        @foreach ($categories_discussion as $item)
                            <div class="col-md-6">
                                <a href="#" class="nav-link text-success mb-2">#{{ $item->name }}</a>
                            </div>
                        @endforeach
                        <div class="col-md-12">
                                @if (Auth::check())
                                <button class="btn btn-login w-100 mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tambah Kategori
                                </button>
                                @else
                                <button class="btn btn-login w-100 mt-5" id="login-button">
                                    Tambah Kategori
                                </button>
                                @endif
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Diskusi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="addCategoryForm" action="{{ route('categories-discussions.store') }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group d-flex">
                                                        <label for="category_name">Nama Kategori</label>
                                                        <input type="text" class="form-control" id="category_name"
                                                            name="name" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-login btn-success">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>


                </div>
            </div>
        </div>


        <h4 class="text-center mt-5 fw-semibold text-success">Diskusi Teraru</h4>

        <div class="container mt-4">
            <div class="row d-flex justify-content-center mb-4">
                @foreach ($discussions as $item)
                    <div class="col-md-6 mt-5">
                        <div class="card p-3 border-0 shadow mb-4">
                            <div class="card-body ">
                                <div class="row">
                                    <!-- Profile Photo -->
                                    <div class="col-md-3">
                                        <img src="https://i.pinimg.com/736x/55/3a/b5/553ab5f0f4090b47e54ee84a39905ae5.jpg"
                                            alt="Profile Photo" class="img-fluid rounded-circle mb-3"
                                            style="max-width: 100px;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="d-flex justify-content-between">
                                            <a href="" class="nav-link fs-4 fw-semibold">{{ $item->user->name }}

                                            </a>

                                            <a href="" class="nav-link text-success ">#{{ $item->category->name }}
                                            </a>
                                            <div class="dropdown">
                                                @if (Auth::check() && $item->user_id === Auth::user()->id)
                                                    <button class="btn btn-outline-success btn-sm dropdown-toggle"
                                                        type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        ...
                                                    </button>
                                                @endif
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li>
                                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#editModal{{ $item->id }}">
                                                            Edit
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <form action="{{ route('discussions.destroy', $item->id) }}" method="POST" id="deleteForm{{ $item->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="dropdown-item" onclick="confirmDelete({{ $item->id }})">Delete</button>
                                                        </form>
                                                        
                                                    </li>
                                                </ul>

                                                <!-- Modal Edit Diskusi -->
                                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit
                                                                    Diskusi</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="editDiscussionForm"
                                                                    action="{{ route('discussions.update', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <div class="form-group row mb-3">
                                                                            <label for="categorySelect"
                                                                                class="col-sm-3 col-form-label">Pilih
                                                                                Kategori:</label>
                                                                            <div class="col-sm-9">
                                                                                <select class="form-control"
                                                                                    id="categorySelect"
                                                                                    name="category_id">
                                                                                    @foreach ($categories_discussion as $category)
                                                                                        <option
                                                                                            value="{{ $category->id }}">
                                                                                            {{ $category->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row mb-3">
                                                                            <label for="discussionInput"
                                                                                class="col-sm-3 col-form-label">Diskusi:</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control"
                                                                                    id="discussionInput" name="content"
                                                                                    value="{{ $item->content }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-login btn-success">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <p class="card-text">{{ $item->content }}</p>
                                        <div class="mt-2 d-flex justify-content-between gap-5 mb-3">
                                            <a href="{{ route('discussions.show', $item->id) }}"
                                                class="btn btn-success btn-login w-100">Lihat Diskusi</a>

                                            <span class="card-text"><small
                                                    class="text-muted">{{ Carbon\Carbon::parse($item->birthday)->formatLocalized('%d %B %Y') }}</small></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Yakin mau hapus diskusi?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#52b678",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form when user confirms deletion
                    document.getElementById('deleteForm'+id).submit();
                }
            });
        }
    </script>
    <script>
        // Cek apakah tombol login ada di halaman
        const loginButton = document.getElementById('login-button');
    
        if (loginButton) {
            // Tambahkan event listener untuk menampilkan SweetAlert saat tombol login diklik
            loginButton.addEventListener('click', function(event) {
                event.preventDefault();
    
                Swal.fire({
                    title: 'Peringatan',
                    text: 'Anda harus login terlebih dahulu untuk mengirim diskusi.',
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
@endsection
