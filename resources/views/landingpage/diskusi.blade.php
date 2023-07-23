@extends('layouts.landingpage')

@section('content')
<section class="my-5 py-5">
    <h2 class="text-center fw-bold text-success pt-5">DISCUSSION FORUM</h2> 
    
    <div class="container mt-4 ">
        <div class="row d-flex justify-content-center mb-4">
            <div class="col-md-4">
                <form>
                    <div class="form-group d-flex">
                        <textarea class="form-control" id="commentInput" style="height: 100px" rows="1" placeholder=" Tell everyone what your problem is......."></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-success float-end mt-3">Kirim</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
    
 
        <h4 class="text-center mb-5">Categories</h4> 
        <div class="row d-flex justify-content-center mb-4">
          <div class="col-md-2" >
          <button type="button" class="btn btn-success w-100">Pregnancy </button>
          </div>
          <div class="col-md-2">
          <button type="button" class="btn btn-success w-100"> Bebies</button>
          </div>
          <div class="col-md-2">
          <button type="button" class="btn btn-success w-100">Mental Health </button>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
          <div class="col-md-2" >
          <button type="button" class="btn btn-success w-100">Starting A Family</button>
          </div>
          <div class="col-md-2">
          <button type="button" class="btn btn-success w-100"> Raising Kids</button>
          </div>
          <div class="col-md-2">
          <button type="button" class="btn btn-success w-100">Kinderd </button>
          </div>
        </div>
      </div>
    
      <h4 class="text-center mt-5">Popular Threads</h4> 
    
      <div class="container mt-4">
        <div class="row d-flex justify-content-center mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Profile Photo -->
                            <div class="col-md-3">
                                <img src="https://i.pinimg.com/736x/55/3a/b5/553ab5f0f4090b47e54ee84a39905ae5.jpg" alt="Profile Photo" class="img-fluid rounded-circle mb-3" style="max-width: 100px;">
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
                                <img src="https://i.pinimg.com/736x/55/3a/b5/553ab5f0f4090b47e54ee84a39905ae5.jpg" alt="Profile Photo" class="img-fluid rounded-circle mb-3" style="max-width: 100px;">
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