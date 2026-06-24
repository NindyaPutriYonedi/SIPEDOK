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

        <div class="card border-0 shadow-sm mb-4 detail-card">

    <div class="card-header bg-white border-0 py-3">

        <h6 class="fw-semibold mb-0" id="step-title">
            Asbuilt 1
        </h6>

    </div>

    <div class="card-body">

        <input type="hidden" id="detail_id">

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Nomor Kontrak
                </label>

                <input
                    type="text"
                    id="no_kontrak"
                    class="form-control modern-input">

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Tanggal
                </label>

                <input
                    type="date"
                    id="tanggal"
                    class="form-control modern-input">

            </div>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Rekanan
            </label>

            <input
                type="text"
                id="rekanan"
                class="form-control modern-input">

        </div>

        <div>

            <label class="form-label">
                Keterangan
            </label>

            <textarea
                id="keterangan"
                rows="4"
                class="form-control modern-input"></textarea>

        </div>

    </div>

</div>

<div class="d-flex justify-content-between mb-3">

    <button
        type="button"
        id="btnBack"
        class="btn btn-secondary">

        Back

    </button>

    <button
        type="button"
        id="btnNext"
        class="btn btn-primary">

        Next

    </button>

</div>

<div id="hidden-inputs"></div>

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
<script>

document.addEventListener('DOMContentLoaded', function(){

    let currentStep = 0;

    const dataAsbuilt = @json(
    $data->asbuilt
);

    const totalStep = dataAsbuilt.length;

    const detailId =
        document.getElementById('detail_id');

    const noKontrak =
        document.getElementById('no_kontrak');

    const tanggal =
        document.getElementById('tanggal');

    const rekanan =
        document.getElementById('rekanan');

    const keterangan =
        document.getElementById('keterangan');

    const btnBack =
        document.getElementById('btnBack');

    const btnNext =
        document.getElementById('btnNext');

    const title =
        document.getElementById('step-title');

    const hiddenInputs =
        document.getElementById('hidden-inputs');

    function loadStep(){

        const data = dataAsbuilt[currentStep];

        title.innerHTML =
            'Asbuilt ' + (currentStep + 1);

        detailId.value =
            data.id;

        noKontrak.value =
            data.no_kontrak;

        tanggal.value =
            data.tanggal;

        rekanan.value =
            data.rekanan;

        keterangan.value =
            data.keterangan;

        btnBack.style.visibility =
            currentStep === 0
                ? 'hidden'
                : 'visible';

        btnNext.innerText =
            currentStep === totalStep - 1
                ? 'Simpan Perubahan'
                : 'Next';
    }

    function saveCurrentStep(){

        dataAsbuilt[currentStep] = {

            id : detailId.value,

            no_kontrak :
                noKontrak.value,

            tanggal :
                tanggal.value,

            rekanan :
                rekanan.value,

            keterangan :
                keterangan.value
        };
    }

    btnBack.addEventListener(
        'click',
        function(){

            saveCurrentStep();

            if(currentStep > 0){

                currentStep--;

                loadStep();

            }

        }
    );

    btnNext.addEventListener(
        'click',
        function(){

            saveCurrentStep();

            if(currentStep < totalStep - 1){

                currentStep++;

                loadStep();

                return;
            }

            hiddenInputs.innerHTML = '';

            dataAsbuilt.forEach(item => {

                hiddenInputs.innerHTML += `

                    <input
                        type="hidden"
                        name="detail_id[]"
                        value="${item.id}">

                    <input
                        type="hidden"
                        name="no_kontrak[]"
                        value="${item.no_kontrak}">

                    <input
                        type="hidden"
                        name="tanggal[]"
                        value="${item.tanggal}">

                    <input
                        type="hidden"
                        name="rekanan[]"
                        value="${item.rekanan}">

                    <input
                        type="hidden"
                        name="keterangan[]"
                        value="${item.keterangan}">

                `;
            });

            this.closest('form').submit();

        }
    );

    loadStep();

});

</script>
@endsection
