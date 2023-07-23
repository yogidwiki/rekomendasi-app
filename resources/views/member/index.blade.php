@extends('layouts.dashboard')

@section('content')
@if(Session::has('succes'))
<div class="alert alert-primary alert-dismissible" role="alert">
  {{ Session::get('succes') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<h4 class="fw-bold py-3 mb-4">Tabel Members</h4>
<div class="row">
  <div class="col-md-12">
    <div class="card p-4">
      <div class="col-md-2">
        <button type="button" class="btn btn-primary mb-3 " data-bs-toggle="modal" data-bs-target="#modalCenter">
          Tambah
        </button>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover" id="dataTables">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Jenis Kelamin</th>
              <th>instagram</th>
              <th>github</th>
              <th>linkedin</th>
              <th>Image</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($members as $member)
            <tr>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                <strong>{{ $loop->iteration }}</strong>
              </td>
              <td>
                {{$member->nama}}
              </td>
              <td>
                {{$member->email}}
              </td>
              <td>
                {{$member->jenis_kelamin}}
              </td>
              <td>
                {{$member->instagram}}
              </td>
              <td>
                {{$member->github}}
              </td>
              <td>
                {{$member->linkedin}}
              </td>
              <td>
                <img src="{{ asset('/public/images/' . $member->image) }}" class="w-50">
              </td>
              <td>
                <div class="d-flex gap-2">
                  <a href="{{ route('member.edit', $member->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $member->id }}">Edit</a>
                  <form method="POST" action="{{ route('member.destroy', $member->id) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger delete-button btn-sm" data-name="{{$member->name}}" data-id="{{$member->id}}">Hapus</button>
                  </form>


                </div>
              </td>
            </tr>

            <!-- Modal Update -->
            <div class="modal fade" id="modalEdit{{ $member->id }}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Update item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{{ route('member.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                      <div class="row">
                        <div class="col mb-3">
                          <label for="nameWithTitle" class="form-label">Name</label>
                          <input type="text" id="nameWithTitle" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $member->nama }}">
                          @error('nama')
                          <span class="invalid-feedback">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="row g-2 mb-3">
                        <div class="col mb-0">
                          <label for="emailWithTitle" class="form-label">Email</label>
                          <input type="email" id="emailWithTitle" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $member->email }}">
                          @error('email')
                          <span class="invalid-feedback">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Jenis Kelamin</label>
                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="exampleFormControlSelect1" name="jenis_kelamin" aria-label="Default select example" required>
                          <option disabled selected>Pilih jenis kelamin</option>
                          <option value="laki-laki" {{ $member->jenis_kelamin === 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                          <option value="perempuan" {{ $member->jenis_kelamin === 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <div class="mb-3">
                          <label for="instagramWithTitle" class="form-label">Instagram</label>
                          <div class="input-group">
                            <span class="input-group-text" id="instagram">https://instagram.com/</span>
                            <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" placeholder="username" aria-describedby="basic-addon3 basic-addon4" value="{{ $member->instagram }}">
                            @error('instagram')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col mb-3">
                          <label for="githubWithTitle" class="form-label">github</label>
                          <div class="input-group">
                            <span class="input-group-text" id="github">https://github.com/ </span>
                            <input type="text" class="form-control @error('github') is-invalid @enderror" id="github" name="github" placeholder="username" aria-describedby="basic-addon3 basic-addon4" value="{{ $member->github }}">
                            @error('github')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col mb-3">
                          <label for="linkedinWithTitle" class="form-label">linkedin</label>
                          <div class="input-group">
                            <span class="input-group-text" id="linkedin">https://linkedin.com/</span>
                            <input type="text" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" name="linkedin" placeholder="username" aria-describedby="basic-addon3 basic-addon4" value="{{ $member->linkedin }}">
                            @error('linkedin')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="formFile" class="form-label">Foto</label>
                          <!-- Input file untuk memilih gambar -->
                          <input type="file" id="imageInput" name="image" class="form-control mb-3 @error('image') is-invalid @enderror">
                          <!-- Gambar pratinjau -->
                          <img id="imagePreview" src="{{ asset('public/images/' . $member->image) }}" alt="Preview" style="max-width: 200px; max-height: 200px;">
                          @error('image ')
                          <span class="invalid-feedback">{{ $message }}</span>
                          @enderror
                        </div>


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
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

<!-- Modal add-->

<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Tambah Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameWithTitle" class="form-label">Name</label>
              <input type="text" id="nameWithTitle" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Enter Name" >
              @error('nama')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col mb-0">
              <label for="emailWithTitle" class="form-label">Email</label>
              <input type="email" id="emailWithTitle" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email@example.com" \>
              @error('email')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col mb-0">
              <label for="exampleFormControlSelect1" class="form-label">Jenis Kelamin</label>
              <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="exampleFormControlSelect1" name="jenis_kelamin" aria-label="Default select example" >
                <option disabled selected>Pilih jenis kelamin</option>
                <option value="laki-laki">Laki-Laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
              @error('jenis_kelamin')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label for="instagramWithTitle" class="form-label">Instagram</label>
            <div class="input-group">
              <span class="input-group-text" id="instagramLabel">https://instagram.com/</span>
              <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" placeholder="username" aria-describedby="instagramLabel" >
              @error('instagram')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="col mb-3">
            <label for="githubWithTitle" class="form-label">GitHub</label>
            <div class="input-group">
              <span class="input-group-text" id="githubLabel">https://github.com/ </span>
              <input type="text" class="form-control @error('github') is-invalid @enderror" id="github" name="github" placeholder="username" aria-describedby="githubLabel" >
              @error('github')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="col mb-3">
            <label for="linkedinWithTitle" class="form-label">LinkedIn</label>
            <div class="input-group">
              <span class="input-group-text" id="linkedinLabel">https://linkedin.com/</span>
              <input type="text" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" name="linkedin" placeholder="username" aria-describedby="linkedinLabel" >
              @error('linkedin')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Foto</label>
            <input type="file" id="gambar" name="image" onchange="previewImage()" class="form-control mb-3 @error('image') is-invalid @enderror" >
            <img id="preview" src="" class="img-preview img-fluid mb-4 col-sm-8">
            @error('image')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
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

<style>
  .modal-body {
    max-height: 400px;
    overflow: auto;
  }
</style>

</div>

@endsection

@section('script')
<script>
  function previewImage(event) {
    var ofReader = new FileReader();
    ofReader.readAsDataURL(document.getElementById("gambar").files[0]);

    ofReader.onload = function(oFREvent) {
      document.getElementById("preview").src = oFREvent.target.result;
    };
  }
</script>
@endsection