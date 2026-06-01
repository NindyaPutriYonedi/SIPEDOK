@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

<div>
    <h2 class="fw-bold mb-0">Tambah Data MC0</h2>
    <small class="text-muted">
        Form Input Data MC0
    </small>
</div>

</div>

<div class="card border-0 shadow-sm rounded-4">


<div class="card-body">

    <form action="/mc0/store"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal MC0</label>
                <input type="date"
                       name="tgl_mcu"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text"
                       name="lokasi"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Pemohon</label>
                <input type="text"
                       name="pemohon"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Area Pelayanan</label>
                <input type="text"
                       name="area_pelayanan"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Rekanan</label>
                <input type="text"
                       name="rekanan"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Pengawas</label>
                <input type="text"
                       name="pengawas"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Dokumentasi</label>
                <input type="file"
                       name="dokumentasi"
                       class="form-control"
                       accept="image/*">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Status Digitasi</label>

                <select name="status_digitasi"
                        class="form-control">

                    <option value="">
                        -- Pilih Status --
                    </option>

                    <option value="Belum Digitasi">
                        Belum Digitasi
                    </option>

                    <option value="Sudah Digitasi">
                        Sudah Digitasi
                    </option>

                </select>

            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal Digitasi</label>
                <input type="date"
                       name="tanggal_digitasi"
                       class="form-control">
            </div>

            <div class="col-12 mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan"
                          class="form-control"
                          rows="3"></textarea>
            </div>

        </div>

        <button type="submit"
                class="btn btn-primary">
            Simpan
        </button>

        <a href="/mc0"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</div>

@endsection
