@extends('layouts.landingpage')

@section('content')
<style>
    .banner{
        height: 350px;
        margin-top: -25px;
            background-image: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0)), url('{{ asset('image/cipung.png') }}');
            background-size: cover;
            background-posisition: center;
    }
</style>
    <div class="banner">

    </div>
    <section>
        <div class="container">
            <div class="row d-flex align-items-center my-5">
                <div class="col-md-4">
                    <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded" width="100%">
                </div>
                <div class="col-md-6">
                    <span>Lorem ipsum dolor sit amet.</span>
                    <h3 class="fw-semibold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, eos.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="description mb-4">
                        <h6 class="fw-semibold">Author :</h6>
                        <span>Ellen Sturm niz</span>
                    </div>
                    <div class="description mb-4">
                        <h6 class="fw-semibold">Category :</h6>
                        <span>Ellen Sturm niz</span>
                    </div>
                    <div class="description mb-4">
                        <h6 class="fw-semibold">Release Date :</h6>
                        <span>june, 29 2023</span>
                    </div>
                    
                    
                </div>
                <div class="col-md-5">
                    <h6 class="mb-3 fw-semibold">About this article</h6>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum impedit veniam in nesciunt. Ipsam esse quo totam quod omnis. Corrupti repellat praesentium alias quibusdam voluptates neque vitae ipsa quae, explicabo laborum expedita hic at, ratione ducimus quod autem, iure ut. Eius eos assumenda facilis nisi possimus vero iste asperiores labore molestiae ipsum harum fugit impedit totam, officiis voluptatem dicta! Dolores, reiciendis eius? Iure ipsam labore consectetur distinctio doloribus commodi, ut cupiditate soluta. Provident autem tempora, rerum eum adipisci, necessitatibus alias placeat temporibus doloremque accusamus repellat quibusdam fuga, neque numquam culpa quisquam possimus iure obcaecati similique dolor! Suscipit itaque ad laboriosam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum impedit veniam in nesciunt. Ipsam esse quo totam quod omnis. Corrupti repellat praesentium alias quibusdam voluptates neque vitae ipsa quae, explicabo laborum expedita hic at, ratione ducimus quod autem, iure ut. Eius eos assumenda facilis nisi possimus vero iste asperiores labore molestiae ipsum harum fugit impedit totam, officiis voluptatem dicta! Dolores, reiciendis eius? Iure ipsam labore consectetur distinctio doloribus commodi, ut cupiditate soluta..</p>
                </div>
                <div class="col-md-4">
                    <h6 class="mb-3 fw-semibold">Related article</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded" width="100%">
                        </div>
                        <div class="col-md-6">
                            <h5 class="fw-semibold">Lorem ipsum dolor, sit amet consectetur adipisicing.</h5> 
                            <p class="fs-6">dolor sit amet.</p>
                            
                        </div>
                        <hr class="mt-4" style="border-width: 2px">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded" width="100%">
                        </div>
                        <div class="col-md-6">
                            <h5 class="fw-semibold">Lorem ipsum dolor, sit amet consectetur adipisicing.</h5> 
                            <p class="fs-6">dolor sit amet.</p>
                            
                        </div>
                        <hr class="mt-4" style="border-width: 2px">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded" width="100%">
                        </div>
                        <div class="col-md-6">
                            <h5 class="fw-semibold">Lorem ipsum dolor, sit amet consectetur adipisicing.</h5> 
                            <p class="fs-6">dolor sit amet.</p>
                            
                        </div>
                        <hr class="mt-4" style="border-width: 2px">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <hr>
        <div class="container">
            <div class="row d-flex justify-content-between align-itemms-center py-3">
                <div class="col-md-6 ms-auto ">
                    <h3 class="fw-semibold">
                        All Discussion
                    </h3>
                </div>
                <div class="col-md-6 text-end  ">
                    <button class="btn btn-login btn-secondary"> + Add Comment</button>
                </div>
            </div>
            
        </div>
        
        <hr>
    </section>
    <div class="container my-5">
        <h6>1.378 Comments</h6>
        <div class="container mt-4">
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
    </div>

@endsection