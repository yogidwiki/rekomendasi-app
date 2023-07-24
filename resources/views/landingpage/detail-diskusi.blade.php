@extends('layouts.landingpage')

@section('content')
<div style="height:100px"></div>
<div class="container my-5">
    <h2 class="fw-bold text-success text-center mb-5">
        DETAIL DISKUSI
    </h2>
    <div class="row d-flex justify-content-center mb-4">
        <div class="col-md-12">
            <div class="card p-3 border-0" style="box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;">
                <div class="card-body">
                    <div class="row gap-5">
                        <!-- Profile Photo -->
                        <div class="col-md-1">
                            <img src="https://i.pinimg.com/736x/55/3a/b5/553ab5f0f4090b47e54ee84a39905ae5.jpg" alt="Profile Photo" class="img-fluid rounded-circle mb-3" style="max-width: 100px;">
                        </div>
                        <div class="col-md-10">
                            <div class="d-flex">

                                <h5 class="card-title fw-semibold">{{$discussion->user->name}}</h5>
                                <p class="badge text-bg-primary mx-3">{{$discussion->category->name}}</p>
                            </div>
                            <p class="card-text">{{$discussion->content}}</p>
                            <div class="row d-flex justify-content-between">
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <span ><i class="bi bi-chat-left-text-fill"></i>  203</span>
                                        <a class="nav-link mx-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="bi bi-reply "></i>  Reply
                                          </a>
                                    </div>
                                
                                </div>
                                <div class="col-md-6">
                                    <span class="float-end text text-secondary fs-7 "> <i>{{ Carbon\Carbon::parse($discussion->created_at)->formatLocalized('%d %B %Y') }}</i> </span>
                                </div>

                            </div>
                            <div class="collapse mt-3 bg-warning" id="collapseExample">
                                <div class="card border-0 card-body" style="box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;">
                                    <div class="row gap-5">
                                        <!-- Profile Photo -->
                                        <div class="col-md-1">
                                            <img src="https://i.pinimg.com/736x/55/3a/b5/553ab5f0f4090b47e54ee84a39905ae5.jpg" alt="Profile Photo" class="img-fluid rounded-circle mb-3" style="max-width: 100px;">
                                        </div>
                                        <div class="col-md-10">
                                            <h5 class="card-title">Taehyoung</h5>
                                            <div class="d-flex align-items-center mb-2">
                                                <span class="me-2">⭐⭐⭐⭐⭐</span> <!-- 5-star rating, you can use any symbol for the stars -->
                                                <span class="text-muted">5.0</span> <!-- Rating value, change this accordingly -->
                                            </div>
                                            <p class="card-text">I educate my child with the method of eating while learning.</p>
                                            <div class="row d-flex justify-content-between">
                                                <div class="col-md-6">
                                                    <div class="d-flex">
                                                        <span ><i class="bi bi-chat-left-text-fill"></i>  203</span>
                                                        <a class="nav-link mx-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                            <i class="bi bi-reply "></i>  Reply
                                                          </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="float-end text text-secondary fs-7 "> <i>2 second ago</i> </span>
                                                </div>
                                            </div>
                                            <div class="mt-2 d-flex gap-3 mb-3">
        
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            <div class="mt-2 d-flex gap-3 mb-3">

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection