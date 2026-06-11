@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="mb-4">

        <h3 class="fw-bold mb-1">
            Tambah Serah Terima
        </h3>

        <small class="text-muted">
            Input data serah terima asbuilt
        </small>

    </div>

    <form action="/serah-terima"
          method="POST">

        @csrf

        {{-- MASTER --}}
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-white border-0 py-3">

                <h5 class="mb-0 fw-semibold">
                    Informasi Serah Terima
                </h5>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Tanggal Terima
                        </label>

                        <input
                            type="date"
                            name="tanggal_terima"
                            class="form-control modern-input"
                            required>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Penerima
                        </label>

                        <input
                            type="text"
                            name="penerima"
                            class="form-control modern-input"
                            required>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Jumlah Asbuilt
                        </label>

                        <input
                            type="number"
                            min="1"
                            id="jumlah_asbuilt"
                            name="jumlah_asbuilt"
                            class="form-control modern-input"
                            required>

                    </div>

                </div>

            </div>

        </div>

        {{-- DETAIL DINAMIS --}}
        <div id="detail-container"></div>

        <div class="d-flex justify-content-end gap-2">

            <a href="/serah-terima"
               class="btn btn-light cancel-btn">

                Kembali

            </a>

            <button
                type="submit"
                class="btn btn-primary save-btn">

                Simpan Data

            </button>

        </div>

    </form>

</div>

<style>

.card{
    border-radius:18px;
}

.modern-input{
    border-radius:12px;
    padding:12px;
    border:1px solid #dbe2ea;
}

.modern-input:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,.1);
}

.form-label{
    font-weight:600;
    margin-bottom:8px;
}

.detail-card{
    border-radius:18px;
    overflow:hidden;
}

.save-btn,
.cancel-btn{
    border-radius:12px;
    padding:10px 20px;
}

</style>

<script>

document.addEventListener('DOMContentLoaded', function(){

    const jumlahInput =
        document.getElementById('jumlah_asbuilt');

    const container =
        document.getElementById('detail-container');

    jumlahInput.addEventListener('input', function(){

        let jumlah =
            parseInt(this.value) || 0;

        container.innerHTML = '';

        for(let i=1; i<=jumlah; i++)
        {
            container.innerHTML += `

            <div class="card border-0 shadow-sm mb-4 detail-card">

                <div class="card-header bg-white py-3">

                    <h6 class="mb-0 fw-semibold">

                        Asbuilt ${i}

                    </h6>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Nomor Kontrak
                            </label>

                            <input
                                type="text"
                                name="no_kontrak[]"
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
                                class="form-control modern-input"
                                required>

                        </div>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Rekanan
                        </label>

                        <input
                            type="text"
                            name="rekanan[]"
                            class="form-control modern-input"
                            required>

                    </div>

                    <div>

                        <label class="form-label">
                            Keterangan
                        </label>

                        <textarea
                            name="keterangan[]"
                            rows="3"
                            class="form-control modern-input"></textarea>

                    </div>

                </div>

            </div>

            `;
        }

    });

});

</script>

@endsection
