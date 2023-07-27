@extends('layouts.landingpage')
@section('css')
@section('content')
    <style>
        .pagination .page-item.active .page-link {
            color: white;
            background-color: green;
        }

        .page-link {
            color: green;
            border: none;
        }

        .page-link:hover {
            color: rgb(118, 218, 118);
            border: none;
        }
    </style>
    <div style="height: 90px;" class="p"></div>
    <div class="container my-5">

        <h2 class="text-center text-success mb-3 fw-bold"> Aticles</h1>
            <div class="row d-flex justify-content-between mb-5">
                <!-- Kolom sebelah kiri (Dropdown untuk kategori) -->
                <div class="col-md-2">
                    <div class="dropdown mt-3">
                        <button class="btn btn-login btn-success dropdown-toggle w-100 d-block" type="button"
                            data-bs-toggle="dropdown">
                            Kategori
                        </button>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $item)
                                <li><a class="dropdown-item" href="{{ route('detail-kategori', $item->id) }}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Kolom sebelah kanan (Input search group append) -->
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <input type="search" placeholder="Cari judul buku..." name="search" class="form-control"
                            id="searchInput">
                        <div class="input-group-append">
                            <button class="btn btn-login butn-success btn-sm" type="button" id="searchButton">Cari</button>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="container mb-3">

                <div id="searchResults"></div>
            </div>

            <div id="articleList">
              @foreach ($articles as $item)
              <div class="row d-flex  align-items-center gap-3 mb-5 p-3"
                  style="border: 1px solid green;border-radius:18px;box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;">
                  <div class="col-md-4" style="overflow: hidden;">
                      <img src="{{ asset('/public/posts/' . $item->image) }}"
                          style="width: 100%; height: 250px; object-fit: cover;border-radius:18px;" alt="">
                  </div>
                  <div class="col-md-7">

                      <a href="{{ route('detail.artikel', ['id' => $item->id]) }}" class="nav-link">
                          <h2 class="fw-semibold mt-3">{{ $item->title }}</h2>
                      </a>
                      <span class="badge text-bg-success mb-2">{{ $item->category->name }}</span>

                      <p>
                          {{ $item->description }} Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo ipsam
                          alias, eligendi fugiat expedita unde assumenda incidunt velit repudiandae aperiam.
                      </p>
                      <div class="d-flex gap-3 align-items-center">
                          <img src="{{ asset('/image/profile.png') }}" style="width: 50px" alt="">
                          <div class="row">
                              <span class="fw-semibold fs-5">{{ $item->author }}</span>
                              <span>{{ $item->publisher }}</span>
                          </div>
                      </div>
                      <p class="text-end">{{ Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y') }}</p>
                  </div>
              </div>
          @endforeach
            </div>
            


            <!-- Tampilkan tombol next dan previous dengan gaya Bootstrap -->
            <div class="d-flex justify-content-center mt-5">
                <ul class="pagination">
                    <li class="page-item  {{ $articles->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $articles->previousPageUrl() }}" tabindex="-1"
                            aria-disabled="true">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $articles->lastPage(); $i++)
                        <li class="page-item {{ $articles->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $articles->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $articles->currentPage() == $articles->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $articles->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </div>



    </div>


@endsection
