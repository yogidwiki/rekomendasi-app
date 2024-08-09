@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <!-- Jumlah Orang Tua -->
        <div class="col-md-4 mb-3">
            <div class="card bg-light text-dark shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Orang Tua</h5>
                    <p class="card-text">{{ $jumlahOrangTua }}</p>
                </div>
            </div>
        </div>

        <!-- Jumlah Anak -->
        <div class="col-md-4 mb-3">
            <div class="card bg-light text-dark shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Anak</h5>
                    <p class="card-text">{{ $jumlahAnak }}</p>
                </div>
            </div>
        </div>

        <!-- Jumlah Imunisasi -->
        <div class="col-md-4 mb-3">
            <div class="card bg-light text-dark shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Imunisasi</h5>
                    <p class="card-text">{{ $jumlahImunisasi }}</p>
                </div>
            </div>
        </div>

        <!-- Jumlah Rekam Medis -->
        <div class="col-md-4 mb-3">
            <div class="card bg-light text-dark shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Rekam Medis</h5>
                    <p class="card-text">{{ $jumlahRekamMedis }}</p>
                </div>
            </div>
        </div>

        <!-- Jumlah Artikel -->
        <div class="col-md-4 mb-3">
            <div class="card bg-light text-dark shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Artikel</h5>
                    <p class="card-text">{{ $jumlahArtikel }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
