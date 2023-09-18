@extends('layouts.landingpage')

@section('content')
<style>
    .pagination .page-item.active .page-link {
        color: white;
        background-color: green;
    }
    .page-link{
        color: green;
        border: none;
    }
    .page-link:hover{
        color: rgb(118, 218, 118);
        border: none;
    }
</style>


    <section class="my-5 py-5">
        <div class="container">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('content'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('content') }}
            </div>
        @endif
        </div>
        

        <div class="container mt-4">
            <h2 class="text-center fw-bold text-success pt-5">FORUM DISKUSI</h2>
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
                                    placeholder="Tell everyone what your problem is......." required></textarea>
                                    <div class="invalid-feedback">
                                        Please enter your problem description.
                                    </div>
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
                    <h4 class="text-center mb-4">Kategori</h4>
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


        
        <div class="container py-5">
            <h2 class="text-center mt-5 fw-bold text-success">Diskusi Terbaru</h2>
            <div class="row d-flex justify-content-center mb-4 " id="diskusi-container">
                @foreach ($discussions as $item)
                <div class="col-md-6 mt-5">
                    
                    @include('landingpage.diskusi-partial')
                </div>
            @endforeach
            
                <!-- Tampilkan tombol next dan previous dengan gaya Bootstrap -->
                <div class="d-flex justify-content-center mt-5">
                    <ul class="pagination">
                        <li class="page-item  {{ $discussions->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $discussions->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        @for ($i = 1; $i <= $discussions->lastPage(); $i++)
                            <li class="page-item {{ $discussions->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $discussions->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ $discussions->currentPage() == $discussions->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $discussions->nextPageUrl() }}">Next</a>
                        </li>
                    </ul>
                </div>
                
                
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
