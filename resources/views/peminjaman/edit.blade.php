@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-0">Edit Data Peminjaman</h2>
        <small class="text-muted">
            Form Edit Data Peminjaman
        </small>
    </div>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <form action="/peminjaman/{{ $data->id }}" method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Tanggal Pinjam
                    </label>

                    <input type="date"
                           name="tanggal_pinjam"
                           value="{{ $data->tanggal_pinjam }}"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Nama Peminjam
                    </label>

                    <input type="text"
                           name="peminjam"
                           value="{{ $data->peminjam }}"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Tanggal Kembali
                    </label>

                    <input type="date"
                           name="tanggal_kembali"
                           value="{{ $data->tanggal_kembali }}"
                           class="form-control">

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select name="status" class="form-control">

                        <option value="Dipinjam"
                            {{ $data->status == 'Dipinjam' ? 'selected' : '' }}>
                            Dipinjam
                        </option>

                        <option value="Dikembalikan"
                            {{ $data->status == 'Dikembalikan' ? 'selected' : '' }}>
                            Dikembalikan
                        </option>

                    </select>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label fw-semibold">
                        Jumlah Kontrak
                    </label>

                    <input type="number"
                           name="jumlah_kontrak"
                           value="{{ $data->jumlah_kontrak }}"
                           class="form-control"
                           min="1"
                           required>

                </div>

            </div>

            <hr>

            <button type="submit"
                    class="btn btn-primary">
                Update
            </button>

            <a href="/peminjaman"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection
