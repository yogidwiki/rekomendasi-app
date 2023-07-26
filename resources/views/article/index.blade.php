@extends('layouts.dashboard')

@section('content')
@if(Session::has('success'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    @endif
<h4 class="fw-bold py-3 mb-4">Tabel articles</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
                        Tambah
                      </button>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Gambar</th>
                                <th>Pengarang</th>
                                <th>Deskripsi</th>
                                <th>Tahun</th>
                                <th>Penerbit</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($articles as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->title}}</td>
                                    <td> <img src="{{ asset('/public/posts/' . $item->image) }}" style="width: 80px;"
                                        alt=""></td>
                                    <td>{{$item->author}}</td>
                                    <td>{{ Str::limit($item->description, 10) }}</td>
                                    <td>{{$item->year}}</td>
                                    <td>{{$item->publisher}}</td>
                                    <td>{{$item->category->name}}</td>
                                    <td>{{ Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y') }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('articles.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">Edit</a>
                                            <form method="POST" action="{{ route('articles.destroy', $item->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger delete-button"
                                                    data-name="{{ $item->title }}"
                                                    data-id="{{ $item->id }}">Hapus</button>
                                            </form>
                                        </div>
                                        </td>
                                </tr>
                                <!-- Modal Update -->
                                <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Update Artikel</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('articles.update', $item->id) }}" method="POST" enctype="multipart/form-data" >
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="title" class="form-label col-sm-3">Title</label>
                                                        <div class="col-sm-9">
                                                          <input type="text" class="form-control" value="{{$item->title}}" id="title" name="title" required>
                                                        </div>
                                                      </div>
                                                      <div class="row mb-3">
                                                        <label for="author" class="form-label col-sm-3">Author</label>
                                                        <div class="col-sm-9">
                                                          <input type="text" class="form-control" value="{{$item->author}}" id="author" name="author" required>
                                                        </div>
                                                      </div>
                                                      <div class="row mb-3">
                                                        <label for="description" class="form-label col-sm-3">Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" id="description" name="description">{{$item->description}}</textarea>

                                                        </div>
                                                      </div>
                                                      <div class="row mb-3">
                                                        <label for="year" class="form-label col-sm-3">Year</label>
                                                        <div class="col-sm-9">
                                                          <input type="number" class="form-control" value="{{$item->year}}"id="year" name="year">
                                                        </div>
                                                      </div>
                                                      <div class="row mb-3">
                                                        <label for="publisher" class="form-label col-sm-3">Publisher</label>
                                                        <div class="col-sm-9">
                                                          <input type="text" class="form-control" id="publisher" value="{{$item->publisher}}"name="publisher">
                                                        </div>
                                                      </div>
                                                      <div class="row mb-3">
                                                        <label for="category_id" class="form-label col-sm-3">Category</label>
                                                        <div class="col-sm-9">
                                                            <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror select2">
                                                                <option value="">Pilih Kategori</option>
                                                                @foreach($categories as $category)
                                                                    <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                            @error('category_id')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                      </div>
                                                      <div class="row mb-3">
                                                        <label for="image" class="form-label col-sm-3">Image</label>
                                                        <div class="col-sm-9">
                                                          <input type="file"  class="form-control" value="{{$item->image}}"id="image" name="image">
                                                        </div>
                                                      </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

    {{-- modal ADD --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addModalLabel">Add Item</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label for="title" class="form-label col-sm-3">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="author" class="form-label col-sm-3">Author</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="author" name="author" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="description" class="form-label col-sm-3">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" id="description" name="description"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="year" class="form-label col-sm-3">Year</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="year" name="year">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="publisher" class="form-label col-sm-3">Publisher</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="publisher" name="publisher">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="category_id" class="form-label col-sm-3">Category</label>
                  <div class="col-sm-9">
                    <select class="form-select" id="category_id" name="category_id">
                        <option value="" selected disabled>Select a category</option>
                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="image" class="form-label col-sm-3">Image</label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control" id="image" name="image">
                  </div>
                </div>
      
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      
  
  
    
    @endsection
