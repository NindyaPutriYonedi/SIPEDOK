@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-0">Tambah Peminjaman</h2>
        <small class="text-muted">
            Form Input Data Peminjaman
        </small>
    </div>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <form action="/peminjaman/store" method="POST">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Tanggal Pinjam
                    </label>

                    <input type="date"
                           name="tanggal_pinjam"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Nama Peminjam
                    </label>

                    <input type="text"
                           name="peminjam"
                           class="form-control"
                           placeholder="Masukkan nama peminjam"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Tanggal Kembali
                    </label>

                    <input type="date"
                           name="tanggal_kembali"
                           class="form-control">

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select name="status"
                            class="form-control">

                        <option value="Dipinjam">
                            Dipinjam
                        </option>

                        <option value="Dikembalikan">
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
                           class="form-control"
                           min="1"
                           value="1"
                           required>

                </div>

            </div>

            <hr>

            <button type="submit"
                    class="btn btn-primary">

                Simpan

            </button>

            <a href="/peminjaman"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection
