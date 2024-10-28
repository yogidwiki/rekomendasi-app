@extends('layouts.dashboard')

@section('content')
@if(Session::has('success'))
    <div class="alert alert-primary alert-dismissible" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<h4 class="fw-bold py-3 mb-4">Profile</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card p-4">
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Nama</th>
                            <td>{{ "imam" }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ "IMAM@gmail.com" }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <td>{{ "0852312313" }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ "jl.kkadadad" }}</td>
                        </tr>
                        <tr>
                            <th>nama anak</th>
                            <td>{{ "indah" }}</td>
                        </tr>
                        <tr>
                            <th>tanggal lahir</th>
                            <td>{{ "12/01/2023" }}</td>
                        </tr>
                        <tr>
                            <th>Jenis kelamin</th>
                            <td>{{ "laki-laki" }}</td>
                        </tr>
                        <tr>
                            <th>berat lahir</th>
                            <td>{{ "2,9" }}</td>
                        </tr>
                        <tr>
                            <th>tinggi lahir</th>
                            <td>{{ "49" }}</td>
                        </tr>
                        <tr>
                            <th>Anak ke</th>
                            <td>{{ "1" }}</td>
                        </tr>
                        <!-- Tambahkan data lain sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
