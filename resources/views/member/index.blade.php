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
                                <th>Role</th>
                                <th>Jenis Kelamin</th>
                                <th>Image</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($members as $member)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $loop->iteration }}</strong></td>
                                    <td>
                                        {{$member->nama}}
                                    </td>
                                    <td>
                                        {{$member->email}}
                                    </td>
                                    <td>
                                        {{$member->role}}
                                    </td>
                                    <td>
                                        {{$member->jenis_kelamin}}
                                    </td>
                                    <th>
                                        {{$member->image}}
                                    </th>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href=""
                                                class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="">Edit</a>
                                            
                                                <button type="submit" class="btn btn-danger delete-button btn-sm"
                                                    data-name=""
                                                    data-id="">Hapus</button>
                                            
                                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="">View</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- Modal Update -->
                                <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Update item</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="nameWithTitle" class="form-label">Name</label>
                                                            <input type="text" id="nameWithTitle" name="name" class="form-control" value="" required />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row g-2 mb-3">
                                                        <div class="col mb-0">
                                                            <label for="emailWithTitle" class="form-label">Email</label>
                                                            <input type="email" id="emailWithTitle" name="email" class="form-control" value="" required />
                                                        </div>
                                                        <div class="col mb-0">
                                                            <label for="html5-date-input" class="form-label">Tanggal Lahir</label>
                                                            <input class="form-control" name="birthday" type="date" value="" id="html5-date-input" required />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlSelect1" class="form-label">Jenis Kelamin</label>
                                                        <select class="form-select" id="exampleFormControlSelect1" name="gender" aria-label="Default select example" required>
                                                            <option disabled selected>Pilih jenis kelamin</option>
                                                            <option value="laki-laki" >Laki-Laki</option>
                                                            <option value="perempuan" >Perempuan</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlSelect1" class="form-label">Role</label>
                                                        <div class="d-flex gap-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="role" id="adminRadio" value="admin" >
                                                                <label class="form-check-label" for="adminRadio">Admin</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="role" id="userRadio" value="user" >
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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection