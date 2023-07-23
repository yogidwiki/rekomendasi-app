@extends('layouts.dashboard')

@section('content')
@if(Session::has('success'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    @endif
<h4 class="fw-bold py-3 mb-4">Tabel Users</h4>
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
                                <th>Role</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($users as $item)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $loop->iteration }}</strong>
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        {{ $item->is_admin ? 'Admin' : 'User' }}
                                    </td>
                                    <td>
                                        {{ Carbon\Carbon::parse($item->birthday)->formatLocalized('%d %B %Y') }}
                                    </td>
                                    <td>
                                        {{ $item->gender }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('users.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">Edit</a>
                                            <form method="POST" action="{{ route('users.destroy', $item->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger delete-button btn-sm"
                                                    data-name="{{ $item->name }}"
                                                    data-id="{{ $item->id }}">Hapus</button>
                                            </form>
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalReset{{$item->id}}">Reset Password</button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal Update -->
                                <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Update item</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('users.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="nameWithTitle" class="form-label">Name</label>
                                                            <input type="text" id="nameWithTitle" name="name" class="form-control" value="{{ $item->name }}" required />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row g-2 mb-3">
                                                        <div class="col mb-0">
                                                            <label for="emailWithTitle" class="form-label">Email</label>
                                                            <input type="email" id="emailWithTitle" name="email" class="form-control" value="{{ $item->email }}" required />
                                                        </div>
                                                        <div class="col mb-0">
                                                            <label for="html5-date-input" class="form-label">Tanggal Lahir</label>
                                                            <input class="form-control" name="birthday" type="date" value="{{ $item->birthday }}" id="html5-date-input" required />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlSelect1" class="form-label">Jenis Kelamin</label>
                                                        <select class="form-select" id="exampleFormControlSelect1" name="gender" aria-label="Default select example" required>
                                                            <option disabled >Pilih jenis kelamin</option>
                                                            <option value="laki-laki" {{ $item->gender === 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                                            <option value="perempuan" {{ $item->gender === 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                        </select>
                                                        @error('gender')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlSelect1" class="form-label">Role</label>
                                                        <div class="d-flex gap-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="role" id="adminRadio" value="admin" {{ $item->is_admin ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="adminRadio">Admin</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="role" id="userRadio" value="user" {{ !$item->is_admin ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="userRadio">User</label>
                                                            </div>
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
    <!-- Modal add-->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">Tambah User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.store', $item->id) }}" method="POST">
              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col mb-3">
                    <label for="nameWithTitle" class="form-label">Name</label>
                    <input type="text" id="nameWithTitle" name="name" class="form-control" placeholder="Enter Name" required />
                  </div>
                </div>
                <div class="row g-2 mb-3">
                  <div class="col mb-0">
                    <label for="emailWithTitle" class="form-label">Email</label>
                    <input type="email" id="emailWithTitle" name="email" class="form-control" placeholder="email@example.com" required />
                  </div>
                  <div class="form-password-toggle">
                    <label class="form-label" for="basic-default-password32">Password</label>
                    <div class="input-group input-group-merge">
                      <input type="password" class="form-control" id="basic-default-password32" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password" name="password" required />
                      <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>
                </div>
                <div class="row g-2 mb-3">
                  <div class="col mb-0">
                    <label for="exampleFormControlSelect1" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="exampleFormControlSelect1" name="gender" aria-label="Default select example" required>
                      <option disabled selected>Pilih jenis kelamin</option>
                      <option value="1">Laki-Laki</option>
                      <option value="2">Perempuan</option>
                    </select>
                  </div>
                  <div class="col mb-0">
                    <label for="html5-date-input" class="form-label">Tanggal Lahir</label>
                    <input class="form-control" name="birthday" type="date" id="html5-date-input" required />
                  </div>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1" class="form-label">Role</label>
                  <div class="d-flex gap-3">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="role" id="adminRadio" value="admin" />
                      <label class="form-check-label" for="adminRadio">Admin</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="role" id="userRadio" value="user" checked />
                      <label class="form-check-label" for="userRadio">User</label>
                    </div>
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
      

        {{-- Modal reset password  --}}
        <div class="modal fade" id="modalReset{{$item->id}}" tabindex="-999" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Reset Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('reset-password', $item->id) }}" method="POST" id="resetPasswordForm">
                        @csrf
                        <div class="modal-body">
                            <div class="form-password-toggle mb-3">
                                <label class="form-label" for="newPassword">Password baru</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" id="newPassword" name="new_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password" required>
                                    <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="form-password-toggle mb-3">
                                <label class="form-label" for="confirmPassword">Konfirmasi Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password" required>
                                    <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    
    @endsection

    @section('script')
    <script>
        $(document).ready(function() {
    $('#resetPasswordForm').submit(function(e) {
        e.preventDefault();

        var url = $(this).attr('action');
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            success: function(response) {
                // Tambahkan aksi yang ingin Anda lakukan setelah sukses
                // Misalnya, tampilkan pesan sukses menggunakan alert biasa
                toastr.success('Reset password berhasil!');
                location.reload();
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorMessage = '';
                $.each(errors, function(key, value) {
                    errorMessage += value[0] + '\n';
                });

                // Tampilkan pesan error menggunakan alert biasa
                toastr.error('Terjadi kesalahan:\n' + errorMessage);
            }
        });
    });
});


    </script>
    @endsection