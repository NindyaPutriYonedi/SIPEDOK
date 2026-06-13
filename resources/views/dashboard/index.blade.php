@extends('layouts.app')

@section('content')

<div class="card shadow-sm rounded-4 mb-4">

    <div class="card-body p-4">

        <div class="row align-items-center">

            <div class="col-md-2 text-center">
                <i class="bi bi-folder2-open text-primary" style="font-size:70px"></i>
            </div>

            <div class="col-md-10">

                <h3 class="fw-bold text-primary mb-2">
                    Selamat Datang di SIPEDOK
                </h3>

                <h5 class="mb-1">
                    Sistem Informasi Pengelolaan Dokumen
                </h5>

                <h5 class="text-primary fw-bold mb-1">
                    Perumda Air Minum Kota Padang
                </h5>

                <p class="text-secondary mb-0">
                    Divisi Dokumentasi & GIS
                </p>

            </div>

        </div>

    </div>

</div>

<div class="row g-3">

    <!-- MC0 -->
    <div class="col-md-4">
        <div class="card shadow-sm h-100 border-top border-4 border-primary">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <small class="text-muted">Total MC0</small>
                    <h3 class="fw-bold text-primary mb-0">{{ $totalMc0 }}</h3>
                </div>

                <i class="bi bi-folder-fill text-primary fs-1"></i>

            </div>
        </div>
    </div>

    <!-- MC1 -->
    <div class="col-md-4">
        <div class="card shadow-sm h-100 border-top border-4 border-success">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <small class="text-muted">Total MC1</small>
                    <h3 class="fw-bold text-success mb-0">{{ $totalMc1 }}</h3>
                </div>

                <i class="bi bi-journal-check text-success fs-1"></i>

            </div>
        </div>
    </div>

    <!-- Data Kontrak -->
    <div class="col-md-4">
        <div class="card shadow-sm h-100 border-top border-4 border-info">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <small class="text-muted">Data Kontrak</small>
                    <h3 class="fw-bold text-info mb-0">{{ $totalKontrak }}</h3>
                </div>

                <i class="bi bi-file-earmark-text-fill text-info fs-1"></i>

            </div>
        </div>
    </div>

    <!-- Serah Terima -->
    <div class="col-md-4">
        <div class="card shadow-sm h-100 border-top border-4 border-warning">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <small class="text-muted">Serah Terima</small>
                    <h3 class="fw-bold text-warning mb-0">{{ $totalSerahTerima }}</h3>
                </div>

                <i class="bi bi-clipboard-check-fill text-warning fs-1"></i>

            </div>
        </div>
    </div>

    <!-- Peminjaman -->
    <div class="col-md-4">
        <div class="card shadow-sm h-100 border-top border-4 border-secondary">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <small class="text-muted">Peminjaman</small>
                    <h3 class="fw-bold text-secondary mb-0">{{ $totalPeminjaman }}</h3>
                </div>

                <i class="bi bi-box-seam-fill text-secondary fs-1"></i>

            </div>
        </div>
    </div>

    <!-- User -->
    <div class="col-md-4">
        <div class="card shadow-sm h-100 border-top border-4 border-danger">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <small class="text-muted">User</small>
                    <h3 class="fw-bold text-danger mb-0">{{ $totalUser }}</h3>
                </div>

                <i class="bi bi-people-fill text-danger fs-1"></i>

            </div>
        </div>
    </div>

</div>

@endsection
