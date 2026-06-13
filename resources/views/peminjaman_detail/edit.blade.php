@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">

    
        <div>

            <h2 class="fw-bold mb-0">
                Edit Kontrak
            </h2>

            <small class="text-muted">
                Ubah Data Kontrak Yang Dipinjam
            </small>

        </div>

        <a href="/peminjaman/{{ $data->peminjaman_id }}" class="btn btn-secondary">

            Kembali

        </a>


    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-primary text-white">

            <i class="bi bi-pencil-square me-2"></i>

            Form Edit Kontrak

        </div>

        <div class="card-body p-4">

            <form action="/peminjaman-detail/{{ $data->id }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Nomor Kontrak
                    </label>

                    <input type="text" name="nomor_kontrak" class="form-control" value="{{ $data->nomor_kontrak }}"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Keterangan
                    </label>

                    <input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}">

                </div>

                <button type="submit" class="btn btn-primary">

                    Update

                </button>

            </form>

        </div>

    </div>
@endsection
