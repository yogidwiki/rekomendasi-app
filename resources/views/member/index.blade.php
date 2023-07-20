@extends('layouts.dashboard')

@section('content')

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

                <img src="/storage/images/'.$member->image" class="w-50">


              </td>
              <td>
                <div class="d-flex gap-2">
                  <a href="{{ route('member.edit', $member->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $member->id }}">Edit</a>
                  <form method="POST" action="{{ route('member.destroy', $member->id) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger delete-button btn-sm" data-name="{{$member->name}}" data-id="{{$member->id}}">Hapus</button>
                  </form>

                  <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="">View</button>
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
                          <input type="text" id="nameWithTitle" name="nama" class="form-control" value="{{ $member->nama }}" required />

                        </div>
                      </div>
                      <div class="row g-2 mb-3">
                        <div class="col mb-0">
                          <label for="emailWithTitle" class="form-label">Email</label>
                          <input type="email" id="emailWithTitle" name="email" class="form-control" value="{{ $member->email }}" required />
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="exampleFormControlSelect1" name="jenis_kelamin" aria-label="Default select example" required>
                          <option disabled selected>Pilih jenis kelamin</option>
                          <option value="laki-laki" {{ $member->jenis_kelamin === 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                          <option value="perempuan" {{ $member->jenis_kelamin === 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label">Foto</label>
                        <input type="file" id="formFile" name="image" class="form-control">
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

<!-- Modal add-->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Tambah Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('member.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameWithTitle" class="form-label">Name</label>
              <input type="text" id="nameWithTitle" name="nama" class="form-control" placeholder="Enter Name" required />
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col mb-0">
              <label for="emailWithTitle" class="form-label">Email</label>
              <input type="email" id="emailWithTitle" name="email" class="form-control" placeholder="email@example.com" required />
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col mb-0">
              <label for="exampleFormControlSelect1" class="form-label">Jenis Kelamin</label>
              <select class="form-select" id="exampleFormControlSelect1" name="jenis_kelamin" aria-label="Default select example" required>
                <option disabled selected>Pilih jenis kelamin</option>
                <option value="laki-laki">Laki-Laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">Foto</label>
              <input class="form-control" type="file" id="formFile" name="image">
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
</div>

@endsection