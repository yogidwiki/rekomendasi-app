@extends('layouts.dashboard')

@section('content')
<h4 class="fw-bold py-3 mb-4">Tabel Member</h4>
<div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCenter">
                        Tambah 
                    </button>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
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
                            <tr>
                                <td>Member</td>
                                <td>Member</td>
                                <td>Member</td>
                                <td>Member</td>
                                <td>Member</td>
                                <td>Member</td>
                                <td>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalCenter">Edit</button>
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalReset">Reset Password</button>
                                    </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection