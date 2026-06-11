@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">


<div>
    <h2 class="fw-bold mb-0">Detail Data MC0</h2>
    <small class="text-muted">
        Informasi Lengkap Data MC0
    </small>
</div>

<a href="/mc0" class="btn btn-secondary">
    Kembali
</a>

</div>

<div class="card border-0 shadow-sm rounded-4">


<div class="card-body">

    <table class="table table-borderless">

        <tr>
            <th width="250">Tanggal MC0</th>
            <td>{{ $data->tgl_mcu }}</td>
        </tr>

        <tr>
            <th>Lokasi</th>
            <td>{{ $data->lokasi }}</td>
        </tr>

        <tr>
            <th>Pemohon</th>
            <td>{{ $data->pemohon }}</td>
        </tr>

        <tr>
            <th>Area Pelayanan</th>
            <td>{{ $data->area_pelayanan }}</td>
        </tr>

        <tr>
            <th>Rekanan</th>
            <td>{{ $data->rekanan }}</td>
        </tr>

        <tr>
            <th>Pengawas</th>
            <td>{{ $data->pengawas }}</td>
        </tr>

        <tr>
            <th>Status Digitasi</th>
            <td>
                <span class="badge bg-success">
                    {{ $data->status_digitasi }}
                </span>
            </td>
        </tr>

        <tr>
            <th>Tanggal Digitasi</th>
            <td>{{ $data->tanggal_digitasi }}</td>
        </tr>

    </table>

    <hr>

    <h5 class="fw-bold mb-3">Dokumentasi</h5>

    @if($data->dokumentasi)

        <img src="{{ asset('dokumentasi/'.$data->dokumentasi) }}"
             class="img-fluid rounded shadow-sm"
             style="max-width:500px">

    @else

        <p class="text-muted">
            Tidak ada dokumentasi
        </p>

    @endif

    <hr>

    <h5 class="fw-bold mb-3">Keterangan</h5>

    <p>
        {{ $data->keterangan ?? '-' }}
    </p>

</div>


</div>

@endsection
