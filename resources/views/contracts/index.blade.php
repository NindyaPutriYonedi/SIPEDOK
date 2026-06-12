@extends('layouts.app')

@section('content')

<div class="container py-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h3 class="fw-bold mb-1 text-dark">
            Data Kontrak
        </h3>

        <small class="text-muted">
            Kelola data kontrak pekerjaan
        </small>

    </div>

    <div class="d-flex align-items-center gap-3">

        <form method="GET">

            <div class="d-flex gap-2">

                <div class="input-group search-box">

                    <input
                        type="text"
                        name="keyword"
                        value="{{ request('keyword') }}"
                        class="form-control border-0"
                        placeholder="Search">

                    <button class="btn">
                        <i class="bi bi-search"></i>
                    </button>

                </div>

                <select
    name="tahun"
    class="form-select year-filter"
    onchange="this.form.submit()">

                    <option value="">
                        Semua Tahun
                    </option>

                    @foreach($tahunKontrak as $tahun)

                    <option
                        value="{{ $tahun }}"
                        {{ request('tahun') == $tahun ? 'selected' : '' }}>

                        {{ $tahun }}

                    </option>

                    @endforeach

                </select>

            </div>

        </form>

        @if(auth()->user()->role == 'admin')
        <a href="{{ route('contracts.export', request()->query()) }}"
   class="btn btn-success add-btn">

    <i class="bi bi-file-earmark-excel me-1"></i>
    Export

</a>

        <a href="{{ route('contracts.create') }}"
           class="btn btn-primary add-btn">

            <i class="bi bi-plus-circle me-1"></i>
            Tambah

        </a>
        @endif

    </div>

</div>

<div class="table-wrapper">

    <div class="table-responsive">

        <table class="table custom-table mb-0">

            <thead>

            <tr>

                <th width="70">No</th>
                <th>Tanggal Terima</th>
                <th>No Kontrak</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Berakhir</th>
                <th>Pekerjaan</th>
                <th>Lokasi</th>
                <th>Pelaksana</th>
                <th>Digitasi</th>
                @if(auth()->user()->role == 'admin')
<th width="120">Aksi</th>
@endif

            </tr>

            </thead>

            <tbody>

@forelse($contracts as $contract)

<tr>

    <td>

        <span class="number-badge">

            {{ ($contracts->currentPage() - 1) * $contracts->perPage() + $loop->iteration }}

        </span>

    </td>

    <td>

        {{ \Carbon\Carbon::parse($contract->tanggal_terima)->format('d-m-Y') }}

    </td>

    <td>

        <strong>

            {{ $contract->nomor_kontrak }}

        </strong>

    </td>

    <td>

        {{ \Carbon\Carbon::parse($contract->tanggal_mulai)->format('d-m-Y') }}

    </td>

    <td>

        {{ \Carbon\Carbon::parse($contract->tanggal_berakhir)->format('d-m-Y') }}

    </td>

    <td>

        {{ $contract->pekerjaan }}

    </td>

    <td>

        {{ $contract->lokasi }}

    </td>

    <td>

        {{ $contract->pelaksana }}

    </td>

    <td>

    @if(strtolower($contract->digitasi) == 'sudah')

        <span class="access-full">

            Sudah

        </span>

    @else

        <span class="access-view">

            Belum

        </span>

    @endif

</td>

    <td>

    <div class="action-group">

        {{-- Semua user boleh lihat detail --}}
        <a href="/contracts/{{ $contract->id }}"
           class="action-btn view-btn"
           title="Detail">

            <i class="bi bi-eye"></i>

        </a>

        @if(auth()->user()->role == 'admin')

            {{-- Edit --}}
            <a href="/contracts/{{ $contract->id }}/edit"
               class="action-btn edit-btn"
               title="Edit">

                <i class="bi bi-pencil-square"></i>

            </a>

            {{-- Download --}}
            <a href="{{ route('contracts.download', $contract->id) }}"
               class="action-btn download-btn"
               title="Download">

                <i class="bi bi-download"></i>

            </a>

            {{-- Delete --}}
            <form action="/contracts/{{ $contract->id }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="action-btn delete-btn"
                    onclick="return confirm('Hapus data?')">

                    <i class="bi bi-trash"></i>

                </button>

            </form>

        @endif

    </div>

</td>

</tr>

@empty

<tr>

    <td colspan="10"
        class="text-center py-5 text-muted">

        <i class="bi bi-folder-x fs-1 d-block mb-2"></i>

        Tidak ada data kontrak

    </td>

</tr>

@endforelse

</tbody>

        </table>

    </div>

</div>

<div class="mt-4 d-flex justify-content-end">

    {{ $contracts->onEachSide(1)->links() }}

</div>

</div>

<style>

.search-box{
    width:280px;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 2px 8px rgba(0,0,0,.05);
}

.year-filter{
    width:150px;
    border-radius:12px;
}

.add-btn{
    border-radius:12px;
    padding:10px 18px;
    font-weight:500;
}

.table-wrapper{
    background:#fff;
    border-radius:18px;
    overflow:hidden;
    border:1px solid #e5e7eb;
    box-shadow:0 10px 25px rgba(0,0,0,.05);
}

.custom-table thead{
    background:#f8fafc;
}

.custom-table thead th{
    padding:18px;
    border:none;
    font-size:13px;
    font-weight:600;
    color:#64748b;
    text-transform:uppercase;
}

.custom-table tbody td{
    padding:18px;
    vertical-align:middle;
    border-top:1px solid #f1f5f9;
}

.custom-table tbody tr:hover{
    background:#fafcff;
}

.number-badge{
    width:34px;
    height:34px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    background:#eef4ff;
    color:#2563eb;
    font-weight:600;
}

.access-full{
    background:#dcfce7;
    color:#15803d;
    padding:7px 14px;
    border-radius:30px;
    font-size:13px;
    font-weight:500;
}

.access-view{
    background:#fef3c7;
    color:#b45309;
    padding:7px 14px;
    border-radius:30px;
    font-size:13px;
    font-weight:500;
}

.action-group{
    display:flex;
    flex-direction:column;
    gap:8px;
}

.action-btn{
    width:38px;
    height:38px;
    display:flex;
    align-items:center;
    justify-content:center;
    border:none;
    border-radius:10px;
    text-decoration:none;
}

.view-btn{
    background:#ecfeff;
    color:#0891b2;
}

.edit-btn{
    background:#eef4ff;
    color:#2563eb;
}

.delete-btn{
    background:#fef2f2;
    color:#dc2626;
}

.view-btn:hover{
    background:#0891b2;
    color:white;
}

.edit-btn:hover{
    background:#2563eb;
    color:white;
}

.delete-btn:hover{
    background:#dc2626;
    color:white;
}

.custom-table{
    table-layout: auto;
    width: 100%;
}

.custom-table th{
    white-space: nowrap;
}

.custom-table td{
    vertical-align: middle;
}

</style>

@endsection
