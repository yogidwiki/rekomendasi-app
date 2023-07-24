@extends('layouts.landingpage')

@section('content')
<div class="container">

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    @endif
</div>
    <section class="my-5 py-5">
        <h2 class="text-center fw-bold text-success pt-5">DISCUSSION FORUM</h2>

        <div class="container mt-4">
            <div class="row d-flex justify-content-center gap-5 mb-4">
                <div class="col-md-8 card border-0 p-5 shadow">
                    <form>
                        <div class="form-group row mb-3">
                            <label for="categorySelect" class="col-sm-3 col-form-label">Pilih Kategori:</label>
                            <div class="col-sm-9">
                                <select class="form-control " id="categorySelect" name="category">
                                    @foreach ($categories_discussion as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="commentInput" class="col-sm-3 col-form-label">Tulis Diskusi:</label>
                            <div class="col-sm-9">
                                <textarea class="form-control " id="commentInput" style="height: 100px" rows="1"
                                    placeholder="Tell everyone what your problem is......."></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-login px-3 float-end mt-3">Kirim</button>
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
                            
                            <button class="btn btn-login w-100 mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah Kategori
                            </button>
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
                                            <form id="addCategoryForm" action="{{ route('categories-discussions.store') }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group d-flex">
                                                        <label for="category_name">Nama Kategori</label>
                                                        <input type="text" class="form-control" id="category_name" name="name" required>
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- Profile Photo -->
                                <div class="col-md-3">
                                    <img src="https://i.pinimg.com/736x/55/3a/b5/553ab5f0f4090b47e54ee84a39905ae5.jpg"
                                        alt="Profile Photo" class="img-fluid rounded-circle mb-3" style="max-width: 100px;">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">Taehyoung</h5>
                                    <p class="card-text">I educate my child with the method of eating while learning.</p>
                                    <div class="mt-2 d-flex gap-3 mb-3">
                                        <span class="mr-2">100 Likes</span>
                                        <a href="" class="nav-link ">Like</a>
                                        <span class="card-text"><small class="text-muted">19 Juli 2023</small></span>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Tambahkan komentar...">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button">Kirim</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- Profile Photo -->
                                <div class="col-md-3">
                                    <img src="https://i.pinimg.com/736x/55/3a/b5/553ab5f0f4090b47e54ee84a39905ae5.jpg"
                                        alt="Profile Photo" class="img-fluid rounded-circle mb-3" style="max-width: 100px;">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">Taehyoung</h5>
                                    <p class="card-text">I educate my child with the method of eating while learning.</p>
                                    <div class="mt-2 d-flex gap-3 mb-3">
                                        <span class="mr-2">100 Likes</span>
                                        <a href="" class="nav-link ">Like</a>
                                        <span class="card-text"><small class="text-muted">19 Juli 2023</small></span>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Tambahkan komentar...">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button">Kirim</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row d-flex justify-content-center mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- Profile Photo -->
                                <div class="col-md-3">
                                    <img src="https://i.pinimg.com/736x/55/3a/b5/553ab5f0f4090b47e54ee84a39905ae5.jpg"
                                        alt="Profile Photo" class="img-fluid rounded-circle mb-3" style="max-width: 100px;">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">Taehyoung</h5>
                                    <p class="card-text">I educate my child with the method of eating while learning.</p>
                                    <div class="mt-2 d-flex gap-3 mb-3">
                                        <span class="mr-2">100 Likes</span>
                                        <a href="" class="nav-link ">Like</a>
                                        <span class="card-text"><small class="text-muted">19 Juli 2023</small></span>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Tambahkan komentar...">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button">Kirim</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- Profile Photo -->
                                <div class="col-md-3">
                                    <img src="https://i.pinimg.com/736x/55/3a/b5/553ab5f0f4090b47e54ee84a39905ae5.jpg"
                                        alt="Profile Photo" class="img-fluid rounded-circle mb-3" style="max-width: 100px;">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">Taehyoung</h5>
                                    <p class="card-text">I educate my child with the method of eating while learning.</p>
                                    <div class="mt-2 d-flex gap-3 mb-3">
                                        <span class="mr-2">100 Likes</span>
                                        <a href="" class="nav-link ">Like</a>
                                        <span class="card-text"><small class="text-muted">19 Juli 2023</small></span>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Tambahkan komentar...">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button">Kirim</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
