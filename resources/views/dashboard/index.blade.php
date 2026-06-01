@extends('layouts.app')

@section('content')

<div class="card border-0 shadow-sm rounded-4 mb-4">
    <div class="card-body p-5">
    <div class="row align-items-center">

        <div class="col-md-3 text-center">
            <i class="bi bi-folder2-open text-primary" style="font-size:120px"></i>
        </div>

        <div class="col-md-9">
            <h1 class="fw-bold text-primary mb-3">
                Selamat Datang di SIPEDOK
            </h1>

            <h4 class="fw-semibold">
                Sistem Informasi Pengelolaan Dokumen
            </h4>

            <h4 class="text-primary fw-bold">
                Perumda Air Minum Kota Padang
            </h4>

            <p class="text-secondary mb-0">
                Divisi Dokumentasi & GIS
            </p>
        </div>

    </div>

</div>

</div>

<div class="row g-4">
<div class="col-md-4">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <p class="text-muted mb-1">Total MC0</p>
                <h2 class="fw-bold text-primary">0</h2>
            </div>
            <i class="bi bi-folder-fill text-primary" style="font-size:45px"></i>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <p class="text-muted mb-1">Data Kontrak</p>
                <h2 class="fw-bold text-success">0</h2>
            </div>
            <i class="bi bi-file-earmark-text-fill text-success" style="font-size:45px"></i>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <p class="text-muted mb-1">Serah Terima</p>
                <h2 class="fw-bold text-warning">0</h2>
            </div>
            <i class="bi bi-clipboard-check-fill text-warning" style="font-size:45px"></i>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <p class="text-muted mb-1">Peminjaman</p>
                <h2 class="fw-bold text-info">0</h2>
            </div>
            <i class="bi bi-box-seam-fill text-info" style="font-size:45px"></i>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <p class="text-muted mb-1">User</p>
                <h2 class="fw-bold text-danger">0</h2>
            </div>
            <i class="bi bi-people-fill text-danger" style="font-size:45px"></i>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <p class="text-muted mb-1">Dokumen Digitasi</p>
                <h2 class="fw-bold text-secondary">0</h2>
            </div>
            <i class="bi bi-archive-fill text-secondary" style="font-size:45px"></i>
        </div>
    </div>
</div>
</div>

@endsection
