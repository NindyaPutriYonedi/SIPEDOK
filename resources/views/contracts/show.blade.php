@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                Detail Kontrak
            </h3>
            <small class="text-muted">
                Informasi lengkap data kontrak
            </small>
        </div>

        <a href="{{ route('contracts.index') }}"
           class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali

        </a>

    </div>

    <div class="detail-card">

        <div class="detail-item">
            <label>Nomor Kontrak</label>
            <div>{{ $contract->nomor_kontrak }}</div>
        </div>

        <div class="detail-item">
            <label>Pekerjaan</label>
            <div>{{ $contract->pekerjaan }}</div>
        </div>

        <div class="detail-item">
            <label>Lokasi</label>
            <div>{{ $contract->lokasi }}</div>
        </div>

        <div class="detail-item">
            <label>Periode Kontrak</label>
            <div>

                {{ \Carbon\Carbon::parse($contract->tanggal_mulai)->format('d M Y') }}

                s/d

                {{ \Carbon\Carbon::parse($contract->tanggal_berakhir)->format('d M Y') }}

            </div>
        </div>

        <div class="detail-item">
            <label>Pelaksana</label>
            <div>{{ $contract->pelaksana }}</div>
        </div>

        <div class="detail-item">
            <label>Status Digitasi</label>

            @if(strtolower($contract->digitasi) == 'sudah')

                <button class="btn btn-success btn-sm px-3">

                    <i class="bi bi-check-circle-fill me-1"></i>
                    Sudah Didigitasi

                </button>

            @else

                <button class="btn btn-warning btn-sm px-3">

                    <i class="bi bi-clock-history me-1"></i>
                    Belum Didigitasi

                </button>

            @endif

        </div>

        <div class="detail-item">
            <label>Berkas</label>

            @if(!empty($contract->berkas))

                <a href="{{ route('contracts.download', $contract->id) }}"
                   class="btn btn-primary btn-sm px-3">

                    <i class="bi bi-download me-1"></i>
                    Download Berkas

                </a>

            @else

                <button class="btn btn-danger btn-sm px-3" disabled>

                    <i class="bi bi-x-circle me-1"></i>
                    Berkas Tidak Tersedia

                </button>

            @endif

        </div>

    </div>

</div>

<style>

.detail-card{
    background:#fff;
    border-radius:18px;
    padding:30px;
    border:1px solid #e5e7eb;
    box-shadow:0 10px 25px rgba(0,0,0,.05);
}

.detail-item{
    padding:18px 0;
    border-bottom:1px solid #f1f5f9;
}

.detail-item:last-child{
    border-bottom:none;
}

.detail-item label{
    display:block;
    font-size:13px;
    font-weight:600;
    color:#64748b;
    text-transform:uppercase;
    letter-spacing:.5px;
    margin-bottom:8px;
}

.detail-item div{
    font-size:15px;
    color:#0f172a;
    font-weight:500;
    line-height:1.7;
}

.btn{
    border-radius:10px;
    font-weight:500;
}

</style>

@endsection
