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
                            class="text-muted">{{ Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y') }}</small></span>
                </div>

            </div>
        </div>
    </div>
</div>