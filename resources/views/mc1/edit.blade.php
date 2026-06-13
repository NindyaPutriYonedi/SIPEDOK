@extends('layouts.app')

@section('content')

<h2 class="fw-bold mb-4">Edit Data MC1</h2>

<div class="card border-0 shadow-sm rounded-4">

<div class="card-body">

    <form action="/mc1/{{ $data->id }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Tanggal MC1</label>
                <input type="date"
                       name="tgl_mc1"
                       value="{{ $data->tgl_mc1 }}"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Lokasi</label>
                <input type="text"
                       name="lokasi"
                       value="{{ $data->lokasi }}"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Pemohon</label>
                <input type="text"
                       name="pemohon"
                       value="{{ $data->pemohon }}"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Area Pelayanan</label>
                <input type="text"
                       name="area_pelayanan"
                       value="{{ $data->area_pelayanan }}"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Rekanan</label>
                <input type="text"
                       name="rekanan"
                       value="{{ $data->rekanan }}"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Pengawas</label>
                <input type="text"
                       name="pengawas"
                       value="{{ $data->pengawas }}"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Nomor Addendum</label>
                <input type="text"
                       name="nomor_addendum"
                       value="{{ $data->nomor_addendum }}"
                       class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Dokumentasi</label>

                <input type="file"
                       name="dokumentasi"
                       class="form-control"
                       accept="image/*">

                @if($data->dokumentasi)

                    <img src="{{ asset('dokumentasi/'.$data->dokumentasi) }}"
                         width="120"
                         class="img-thumbnail mt-2">

                @endif

            </div>

            <div class="col-12 mb-3">
                <label>Keterangan Perubahan</label>
                <textarea name="keterangan_perubahan"
                          class="form-control"
                          rows="3">{{ $data->keterangan_perubahan }}</textarea>
            </div>

        </div>

        <button type="submit"
                class="btn btn-primary">
            Update
        </button>

        <a href="/mc1"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</div>

@endsection
