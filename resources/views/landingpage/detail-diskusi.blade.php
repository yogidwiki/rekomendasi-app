@extends('layouts.landingpage')

@section('content')
    <div style="height:100px"></div>
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="container my-5">
        <h2 class="fw-bold text-success text-center mb-5">
            DETAIL DISKUSI
        </h2>

        <div class="row d-flex justify-content-center mb-4">
            <div class="col-md-12">
                <div class="card p-3 border-0"
                    style="box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;">
                    <div class="card-body">
                        <div class="row gap-5">
                            <!-- Profile Photo -->
                            <div class="col-md-1">
                                <img src="{{asset('image/profile.png')}}"
                                    alt="Profile Photo" class="img-fluid rounded-circle mb-3" style="max-width: 100px;">
                            </div>
                            <div class="col-md-10">
                                <div class="d-flex">

                                    <h5 class="card-title fw-semibold">{{ $discussion->user->name }}</h5>
                                    <p class=" text-success mx-3">#{{ $discussion->category->name }}</p>
                                </div>
                                <p class="card-text">{{ $discussion->content }} </p>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-md-6">
                                        <div class="d-flex">
                                            <a class="text-decoration-none btn btn-dark btn-sm p-2 " data-bs-toggle="collapse" href="#komentar"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="bi bi-chat-left-dots-fill"></i> Komentar
                                            </a>
                                        </div>

                                        <!-- Comment Input Field (Hidden by default) -->
                                        <div class="collapse mt-3" id="komentar">
                                            <form action="{{ route('comments.store') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" value="{{ $discussion->id }}"
                                                        name="discussion_id">
                                                    <input type="hidden" value="0" name="parent_id">
                                                    <textarea class="form-control " name="content" id="commentInput" style="height: 100px" rows="1"
                                                        placeholder="Tell everyone what your problem is......."></textarea>
                                                </div>
                                                <button type="submit"
                                                    class="btn btn-login btn-success btn-sm mt-3">Submit</button>
                                            </form>
                                        </div>



                                    </div>
                                    <div class="col-md-6">
                                        <span class="float-end text text-secondary fs-7 ">
                                            <i>{{ Carbon\Carbon::parse($discussion->created_at)->formatLocalized('%d %B %Y') }}</i>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center my-4">
            <div
                class="card p-5 border-0"style="box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;">
                <h3 class="text-success fw-semibold">Komentar</h3>
                @if ($discussion->comments->count() > 0)
                    <span>Total Komentar : {{ $discussion->comments->count() }}</span>
                @endif

                <!-- Tampilkan komentar -->
                @if ($discussion->comments->count() > 0)
                    @foreach ($discussion->comments as $comment)
                        @if ($comment->parent_id === 0)
                            <div class="col-md-12 my-3">
                                <div class="card p-3">
                                    <div class="card-body">
                                        <div class="row gap-5">
                                            <!-- Profile Photo -->
                                            <div class="col-md-1">
                                                <img src="{{asset('image/profile.png')}}"
                                                    alt="Profile Photo" class="img-fluid rounded-circle mb-3"
                                                    style="max-width: 100px;">
                                            </div>
                                            <div class="col-md-10">
                                                <div class="d-flex">
                                                    <h5 class="card-title fw-semibold">{{ $comment->user->name }}</h5>
                                                </div>
                                                <p class="card-text">{{ $comment->content }}</p>
                                                <div class="row d-flex justify-content-between">
                                                    <div class="col-md-6">
                                                        <div class="d-flex">
                                                            <!-- Button trigger modal -->
                                                            <a href="#" class="nav-link mx-3" data-bs-toggle="modal"
                                                                data-bs-target="#replyModal{{ $comment->id }}">
                                                                <i class="bi bi-reply"></i> Reply
                                                            </a>

                                                            <!-- Modal -->
                                                            <!-- Modal untuk membalas komentar -->
                                                            <div class="modal fade" id="replyModal{{ $comment->id }}"
                                                                tabindex="-1"
                                                                aria-labelledby="replyModalLabel{{ $comment->id }}"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="replyModalLabel{{ $comment->id }}">
                                                                                Reply Modal</h5>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <!-- Form untuk membalas komentar -->
                                                                            <form action="{{ route('comments.store') }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="parent_id"
                                                                                    value="{{ $comment->id }}">
                                                                                <input type="hidden" name="discussion_id"
                                                                                    value="{{ $discussion->id }}">
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        for="replyMessage{{ $comment->id }}"
                                                                                        class="form-label">Your
                                                                                        Reply:</label>
                                                                                    <textarea class="form-control" id="replyMessage{{ $comment->id }}" name="content" rows="3"></textarea>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="submit"
                                                                                        class="btn btn-login btn-success">Submit
                                                                                        Reply</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @if ($comment->replies->isNotEmpty())
                                                                <a class="nav-link mx-3" data-bs-toggle="collapse"
                                                                    href="#collapseExample{{ $comment->id }}"
                                                                    role="button" aria-expanded="false"
                                                                    aria-controls="collapseExample{{ $comment->id }}">
                                                                    <i class="bi bi-eye-fill"></i> Balasan
                                                                    {{ $comment->replies->count() }}
                                                                </a>
                                                            @endif

                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <span class="float-end text text-secondary fs-7 ">
                                                            <i>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</i>
                                                        </span>
                                                    </div>

                                                </div>
                                                <div class="collapse my-4" id="collapseExample{{ $comment->id }}">
                                                    @foreach ($comment->replies as $comment)
                                                        <div class="card border-0 card-body mb-3"
                                                            style="box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;">
                                                            <div class="row d-flex">
                                                                <!-- Profile Photo -->
                                                                <div class="col-md-1">
                                                                    <img src="{{asset('image/profile.png')}}"
                                                                        alt="Profile Photo"
                                                                        class="img-fluid rounded-circle mb-3"
                                                                        style="max-width: 100%;">
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <h5 class="card-title fw-semibold">
                                                                        {{ $comment->user->name }}</h5>
                                                                    <p class="card-text">{{ $comment->content }}</p>
                                                                    <div class="float-end">
                                                                            <span
                                                                                class="float-end text text-secondary fs-7 ">
                                                                                <i>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</i>
                                                                            </span>
                                                                    </div>
                                                                    <div class="mt-2 d-flex gap-3 mb-3">


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                    @endforeach
                @else
                    <p class="text-success fw-semibold my-4 text-center">~ Belum ada komentar ~</p>
                @endif

            </div>

        </div>
    </div>
@endsection
