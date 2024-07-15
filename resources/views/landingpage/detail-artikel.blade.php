@extends('layouts.landingpage')

@section('content')
<style>
    .text-aqua {
        color: #00BFFF; /* Warna biru laut */
        }
        .bg-aqua {
        background-color: #00BFFF; /* Warna biru laut */
        }
    .banner{
        height: 25rem;
        margin-top: -25px;
            background-image: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0)), url('https://png.pngtree.com/thumb_back/fh260/back_our/20190623/ourmid/pngtree-outdoor-parent-child-cartoon-banner-image_244316.jpg');
            background-size: cover;
    }
</style>
    <div class="banner">
    </div>
    <section>
        <div class="container ">
            <div class="row d-flex  align-items-center py-5">
                <div class="col-md-4 mb-3" style="overflow: hidden;max-height: 100%">
                    <img src="{{asset('posts/'. $artikel->image)}}" alt="Hero Image" class="img-fluid rounded" width="100%" >
                </div>
                <div class="col-md-6 ">
                    <span class="badge bg-aqua mb-2" >{{$artikel->category->name}}</span>
                    <h3 class="fw-semibold">{{$artikel->title}} </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="description mb-4">
                        <h6 class="fw-semibold">Author :</h6>
                        <span>{{$artikel->author}}</span>
                    </div>
                    <div class="description mb-4">
                        <h6 class="fw-semibold">Category :</h6>
                        <span>{{$artikel->category->name}}</span>
                    </div>
                    <div class="description mb-4">
                        <h6 class="fw-semibold">Release Date :</h6>
                        <span>{{ Carbon\Carbon::parse($artikel->created_at)->formatLocalized('%d %B %Y') }}</span>
                    </div>
                    
                    
                </div>
                <div class="col-md-9">
                    <h6 class="mb-3 fw-semibold">About this article</h6>
                    <p>{{$artikel->description}} </p>
                </div>
                
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row d-flex flex-column align-items-center justify-content-center py-3">
            <div class="col-md-5">

                <h2 class="text-center fw-bold text-aqua">New Articles</h2>
            </div>
            <div class="col-md-5 text-center">
                <p>Artikel terbaru dari parent-app yang dapat memperluas pengetahuan anda!</p>
            </div>
        </div>
        <div class="row d-flex-justify-content-center">
            @foreach ($articles as $item)
            <div class="col-md-3 mb-3" data-aos="fade-up" >
                <a class="text-decoration-none" href="{{ route('detail.artikel', ['id' => $item->id]) }}">
                    <div class="card-article card border-0 p-3 shadow">
                        <div class="article-img" style="overflow: hidden; height: 150px; width: 100%;">
                            <img src="{{ asset('/posts/' . $item->image) }}" alt="Hero Image" style="object-fit: cover; width: 100%; height: 100%;" width="100%">
                        </div>
                        
                        <div class="article-content mt-3">
                            <h5 class="fw-semibold">{{$item->title}}</h5>
                            
                            <span class="badge rounded-pill bg-aqua text-white px-3 py-1 mb-2" >{{$item->category->name}}</span>
                        </div>
                        <div class="d-flex align-items-center gap-3 ">
                            <img src="{{ asset('image/profile.png') }}" alt="Hero Image" width="20%">
                            <div class="flex-column mt-3">
                                
                            <span class="fw-semibold">{{$item->author}}</span>
                            <p class="text-secondary small">{{ Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y') }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            
            
        </div>
    </div>

@endsection