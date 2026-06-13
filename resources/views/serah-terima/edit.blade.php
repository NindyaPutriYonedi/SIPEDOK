@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="mb-4">

        <h3 class="fw-bold text-dark mb-1">
            Edit Serah Terima
        </h3>

        <small class="text-muted">
            Perbarui data serah terima dan seluruh data asbuilt
        </small>

    </div>

    <form action="/serah-terima/{{ $data->id }}"
          method="POST">

        @csrf
        @method('PUT')

        {{-- MASTER DATA --}}
        <div class="card border-0 shadow-sm mb-4 form-card">

            <div class="card-header bg-white border-0 pt-4">

                <h5 class="fw-semibold mb-0">
                    Informasi Serah Terima
                </h5>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Tanggal Terima
                        </label>

                        <input
                            type="date"
                            name="tanggal_terima"
                            value="{{ $data->tanggal_terima }}"
                            class="form-control modern-input"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Penerima
                        </label>

                        <input
                            type="text"
                            name="penerima"
                            value="{{ $data->penerima }}"
                            class="form-control modern-input"
                            required>

                    </div>

                </div>

            </div>

        </div>

        @foreach($data->asbuilt as $detail)

        <div class="card border-0 shadow-sm mb-4 detail-card">

            <div class="card-header bg-white border-0 py-3">

                <div class="d-flex justify-content-between align-items-center">

                    <h6 class="fw-semibold mb-0">

                        <i class="bi bi-file-earmark-text me-2"></i>

                        Asbuilt {{ $loop->iteration }}

                    </h6>

                    <span class="badge bg-primary">

                        Detail {{ $loop->iteration }}

                    </span>

                </div>

            </div>

            <div class="card-body">

                <input
                    type="hidden"
                    name="detail_id[]"
                    value="{{ $detail->id }}">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nomor Kontrak
                        </label>

                        <input
                            type="text"
                            name="no_kontrak[]"
                            value="{{ $detail->no_kontrak }}"
                            class="form-control modern-input"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Tanggal
                        </label>

                        <input
                            type="date"
                            name="tanggal[]"
                            value="{{ $detail->tanggal }}"
                            class="form-control modern-input"
                            required>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Rekanan
                        </label>

                        <input
                            type="text"
                            name="rekanan[]"
                            value="{{ $detail->rekanan }}"
                            class="form-control modern-input"
                            required>

                    </div>

                </div>

                <div class="mb-2">

                    <label class="form-label">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan[]"
                        rows="4"
                        class="form-control modern-input">{{ $detail->keterangan }}</textarea>

                </div>

            </div>

        </div>

        @endforeach

        <div class="d-flex justify-content-end gap-2">

            <a href="/serah-terima"
               class="btn btn-light cancel-btn">

                Kembali

            </a>

            <button type="submit"
                    class="btn btn-primary save-btn">

                <i class="bi bi-check-circle me-1"></i>

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>

<style>

.form-card,
.detail-card{
    border-radius:18px;
    overflow:hidden;
}

.form-card{
    background:#fff;
}

.detail-card{
    background:#fff;
    transition:.2s;
}

.detail-card:hover{
    transform:translateY(-2px);
}

.card-header{
    border-bottom:1px solid #f1f5f9 !important;
}

.form-label{
    font-weight:600;
    color:#334155;
    margin-bottom:8px;
}

.modern-input{
    border:1px solid #e2e8f0;
    border-radius:12px;
    padding:12px 14px;
    transition:.2s;
}

.modern-input:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,.1);
}

.save-btn{
    border-radius:12px;
    padding:10px 22px;
    font-weight:600;
}

.cancel-btn{
    border-radius:12px;
    padding:10px 22px;
    border:1px solid #e2e8f0;
}

.badge{
    padding:8px 12px;
    font-size:12px;
}

</style>

@endsection
