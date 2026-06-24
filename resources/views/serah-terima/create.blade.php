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
                            required
                            oninvalid="this.setCustomValidity('Tanggal terima wajib diisi')"
                            oninput="this.setCustomValidity('')">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Penerima
                        </label>

                        <input
                            type="text"
                            name="penerima"
                            class="form-control modern-input"
                            required
                            oninvalid="this.setCustomValidity('Penerima wajib diisi')"
                            oninput="this.setCustomValidity('')">

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
                            required
                            oninvalid="this.setCustomValidity('Jumlah asbuilt wajib diisi')"
                            oninput="this.setCustomValidity('')">

                    </div>

                </div>

            </div>

        </div>

        {{-- DETAIL DINAMIS --}}
        <div id="detail-container" style="display:none;">

            <div class="card border-0 shadow-sm mb-4 detail-card">

                <div class="card-header bg-white py-3">

                    <h6 class="mb-0 fw-semibold" id="step-title">
                        Asbuilt 1
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
                                id="no_kontrak"
                                class="form-control modern-input"
                                required
                                oninvalid="this.setCustomValidity('Nomor kontrak wajib diisi')"
                                oninput="this.setCustomValidity('')">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Tanggal
                            </label>

                            <input
                                type="date"
                                id="tanggal"
                                class="form-control modern-input"
                                required
                                oninvalid="this.setCustomValidity('Tanggal wajib diisi')"
                                oninput="this.setCustomValidity('')">

                        </div>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Rekanan
                        </label>

                        <input
                            type="text"
                            id="rekanan"
                            class="form-control modern-input"
                            required
                            oninvalid="this.setCustomValidity('Rekanan wajib diisi')"
                            oninput="this.setCustomValidity('')">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Keterangan
                        </label>

                        <textarea
                            id="keterangan"
                            rows="3"
                            class="form-control modern-input"
                            required
                            oninvalid="this.setCustomValidity('Keterangan wajib diisi')"
                            oninput="this.setCustomValidity('')"></textarea>

                    </div>

                </div>

            </div>

            <div class="d-flex justify-content-between mb-3">

                <button type="button"
                        id="btnBack"
                        class="btn btn-secondary">
                    Back
                </button>

                <button type="button"
                        id="btnNext"
                        class="btn btn-primary">
                    Next
                </button>

            </div>

        </div>

        <div id="hidden-inputs"></div>

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

    const tanggalTerima = document.querySelector('[name="tanggal_terima"]');
const penerima = document.querySelector('[name="penerima"]');
    const jumlahInput = document.getElementById('jumlah_asbuilt');
    const container = document.getElementById('detail-container');

    const stepTitle = document.getElementById('step-title');

    const noKontrak = document.getElementById('no_kontrak');
    const tanggal = document.getElementById('tanggal');
    const rekanan = document.getElementById('rekanan');
    const keterangan = document.getElementById('keterangan');

    const btnBack = document.getElementById('btnBack');
    const btnNext = document.getElementById('btnNext');

    const hiddenInputs = document.getElementById('hidden-inputs');

    let currentStep = 0;
    let totalStep = 0;

    let asbuiltData = [];

    jumlahInput.addEventListener('change', function(){

        totalStep = parseInt(this.value) || 0;

        if(totalStep < 1){
            container.style.display = 'none';
            return;
        }

        container.style.display = 'block';

        asbuiltData = [];

        for(let i = 0; i < totalStep; i++){

            asbuiltData.push({
                no_kontrak: '',
                tanggal: '',
                rekanan: '',
                keterangan: ''
            });

        }

        currentStep = 0;

        loadStep();

    });

    function saveCurrentStep(){

        asbuiltData[currentStep] = {
            no_kontrak : noKontrak.value,
            tanggal : tanggal.value,
            rekanan : rekanan.value,
            keterangan : keterangan.value
        };

    }

    function loadStep(){

        let data = asbuiltData[currentStep];

        stepTitle.innerText = `Asbuilt ${currentStep + 1}`;

        noKontrak.value = data.no_kontrak;
        tanggal.value = data.tanggal;
        rekanan.value = data.rekanan;
        keterangan.value = data.keterangan;

        btnBack.style.visibility =
            currentStep === 0 ? 'hidden' : 'visible';

        if(currentStep === totalStep - 1){
            btnNext.innerText = 'Simpan Data';
        }else{
            btnNext.innerText = 'Next';
        }

    }

    btnBack.addEventListener('click', function(){

        saveCurrentStep();

        if(currentStep > 0){

            currentStep--;

            loadStep();

        }

    });

    btnNext.addEventListener('click', function(){

    // VALIDASI FORM MASTER

    if(!tanggalTerima.checkValidity()){
        tanggalTerima.reportValidity();
        return;
    }

    if(!penerima.checkValidity()){
        penerima.reportValidity();
        return;
    }

    if(!jumlahInput.checkValidity()){
        jumlahInput.reportValidity();
        return;
    }

    // VALIDASI DETAIL

    if(!noKontrak.checkValidity()){
        noKontrak.reportValidity();
        return;
    }

    if(!tanggal.checkValidity()){
        tanggal.reportValidity();
        return;
    }

    if(!rekanan.checkValidity()){
        rekanan.reportValidity();
        return;
    }

    if(!keterangan.checkValidity()){
        keterangan.reportValidity();
        return;
    }

    saveCurrentStep();

    if(currentStep < totalStep - 1){

        currentStep++;

        loadStep();

        return;

    }

    hiddenInputs.innerHTML = '';

    asbuiltData.forEach(item => {

        hiddenInputs.innerHTML += `
            <input type="hidden"
                   name="no_kontrak[]"
                   value="${item.no_kontrak}">

            <input type="hidden"
                   name="tanggal[]"
                   value="${item.tanggal}">

            <input type="hidden"
                   name="rekanan[]"
                   value="${item.rekanan}">

            <input type="hidden"
                   name="keterangan[]"
                   value="${item.keterangan}">
        `;

    });

    this.closest('form').submit();

});
});

</script>

@endsection
