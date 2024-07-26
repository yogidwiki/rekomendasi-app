@extends('layouts.dashboard')
@section('title', 'Data Rules')
@section('content')
<div class="container">
    <h1>Data Rules</h1>
    <div class="card shadow border-0">
        <div class="card-body">
            <table class="table" id="dataTables">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usia Balita</th>
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                        <th>Aktivitas Fisik</th>
                        <th>Jenis Kelamin</th>
                        <th>Kalori</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rules as $rule)
                        <tr>
                            <td>{{ $rule->id }}</td>
                            <td>{{ $rule->usia_balita }}</td>
                            <td>{{ $rule->berat_badan }}</td>
                            <td>{{ $rule->tinggi_badan }}</td>
                            <td>{{ $rule->aktivitas_fisik }}</td>
                            <td>{{ $rule->jenis_kelamin }}</td>
                            <td>{{ $rule->kalori }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
