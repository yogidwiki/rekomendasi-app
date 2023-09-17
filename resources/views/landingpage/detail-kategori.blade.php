@extends('layouts.landingpage')

@section('content')
<section>
    <div style="height: 80px"></div>
    
    <div class="container my-5">
        <div class="d-flex gap-3 align-items-center">

            <h2 class="text-start fw-semibold ">Kategori  :</h2>
            
            <span class="badge rounded-pill text-bg-success text-white px-3 py-1 mb-2" >{{$category->name}}</span>
        </div>
        <div class="row">
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
        </div>
        @if ($articles->count() > 0)
    <div class="row d-flex justify-content-center align-items-center ">
        @foreach ($articles as $item)
                <div class="col-md-3 mb-3" data-aos="fade-up" >
                    <a href="{{ route('detail.artikel', ['id' => $item->id]) }}" class="text-decoration-none">
                        <div class="card-article card border-0 p-3 shadow ">
                            <div class="article-img" style="height: 250px; overflow:hidden;">
                                <img src="{{ asset('/public/posts/' . $item->image) }}" alt="Hero Image" width="100%">
                            </div>
                            <div class="article-content mt-3">
                                <h5 class="fw-semibold>">{{$item->title}}</h5>
                                
                                <span class="badge rounded-pill text-bg-success text-white px-3 py-1 mb-2" >{{$item->category->name}}</span>
                            </div>
                            <div class="d-flex align-items-center gap-3 ">
                                <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" width="20%">
                                <div class="flex-column mt-3">
                                    
                                <span class="fw-semibold">Hifni Sadboyyyy</span>
                                <p class="text-secondary small">{{ Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                </div>
                @endforeach
        
    </div>
    @else
        <p class="text-center my-4 fs-4">~ Belum ada artikel pada kategori ini ~</p>
    @endif
    </div>


    @endsection