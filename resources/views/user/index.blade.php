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
                        <tr><th>Nama</th><td>{{ $user->name }}</td></tr>
                        <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                        <tr><th>Nomor Telepon</th><td>{{ $orangTua->nomor_telepon }}</td></tr>
                        <tr><th>Alamat</th><td>{{ $orangTua->alamat }}</td></tr>

                        {{-- Loop through each child in the 'anak' collection --}}
                        @if ($orangTua->anak && $orangTua->anak->isNotEmpty())
                            @foreach ($orangTua->anak as $anak)
                                <tr><th>Nama Anak</th><td>{{ $anak->nama_lengkap }}</td></tr>
                                <tr><th>Tanggal Lahir</th><td>{{ $anak->tanggal_lahir }}</td></tr>
                                <tr><th>Jenis Kelamin</th><td>{{ $anak->jenis_kelamin }}</td></tr>
                                <tr><th>Berat Lahir</th><td>{{ $anak->berat_lahir }}</td></tr>
                                <tr><th>Tinggi Lahir</th><td>{{ $anak->tinggi_lahir }}</td></tr>
                                <tr><th>Anak Ke</th><td>{{ $anak->anak_ke }}</td></tr>
                            @endforeach
                        @else
                            <tr><td colspan="2">Tidak Ada Data Anak</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
