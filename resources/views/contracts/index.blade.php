@extends('layouts.app')

@section('content')

<div class="container py-4">

    @if(session('success'))
    <div id="successAlert"
         class="alert alert-success alert-dismissible fade show shadow-sm border-0">

        {{ session('success') }}

        <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

    {{-- Header --}}
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

            {{-- Search --}}
            <form method="GET" action="{{ route('contracts.index') }}">

                <div class="input-group search-box">

                    <input
                        type="text"
                        name="search"
                        class="form-control border-0"
                        placeholder="Search"
                        value="{{ request('search') }}">

                    <button class="btn">
                        <i class="bi bi-search"></i>
                    </button>

                </div>

            </form>

            {{-- Filter Tahun --}}
            <form method="GET">

                <select
                    name="tahun"
                    class="form-select year-filter"
                    onchange="this.form.submit()">

                    <option value="">
                        Semua Tahun
                    </option>

                    @foreach($tahunList as $tahun)

                        <option
                            value="{{ $tahun }}"
                            {{ request('tahun') == $tahun ? 'selected' : '' }}>

                            {{ $tahun }}

                        </option>

                    @endforeach

                </select>

            </form>

            {{-- Export --}}
            <a href="{{ route('contracts.export', [
                    'tahun' => request('tahun')
                ]) }}"
                class="btn btn-success add-btn">

                <i class="bi bi-file-earmark-excel me-1"></i>
                Export

            </a>

            {{-- Add --}}
            <a href="{{ route('contracts.create') }}"
                class="btn btn-primary add-btn">

                <i class="bi bi-plus-circle me-1"></i>
                Add

            </a>

        </div>

    </div>

    {{-- Table --}}
    <div class="table-wrapper">

        <div class="table-responsive">

            <table class="table custom-table mb-0">

                <thead>

                    <tr>

                        <th width="80">No</th>
                        <th>Tanggal Terima</th>
                        <th>No Kontrak</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                        <th>Pekerjaan</th>
                        <th>Lokasi</th>
                        <th>Pelaksana</th>
                        <th>Digitasi</th>
                        <th width="100" class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($contracts as $contract)

                    <tr>

                        <td>

                            <span class="number-badge">

                                {{ $loop->iteration + (($contracts->currentPage() - 1) * $contracts->perPage()) }}

                            </span>

                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($contract->tanggal_terima)->format('d-m-Y') }}
                        </td>

                        <td class="fw-semibold">
                            {{ $contract->nomor_kontrak }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($contract->tanggal_mulai)->format('d-m-Y') }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($contract->tanggal_berakhir)->format('d-m-Y') }}
                        </td>

                        <td>{{ $contract->pekerjaan }}</td>

                        <td>{{ $contract->lokasi }}</td>

                        <td>{{ $contract->pelaksana }}</td>

                        <td>

                            @if($contract->digitasi == 'Sudah')

                                <span class="access-full">
                                    Sudah
                                </span>

                            @else

                                <span class="access-view">
                                    Belum
                                </span>

                            @endif

                        </td>

                        <td class="text-center">

                            <div class="d-flex flex-column align-items-center gap-2">

                                {{-- Detail --}}
                                <a href="{{ route('contracts.show',$contract->id) }}"
                                    class="action-btn view-btn"
                                    title="Detail">

                                    <i class="bi bi-eye"></i>

                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('contracts.edit',$contract->id) }}"
                                    class="action-btn edit-btn"
                                    title="Edit">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                {{-- Download --}}
                                @if($contract->berkas)

    <a href="{{ route('contracts.download', $contract->id) }}"
       class="action-btn download-btn"
       title="Download">

        <i class="bi bi-download"></i>

    </a>

@else

    <button
        type="button"
        class="action-btn download-btn"
        disabled
        title="File tidak tersedia">

        <i class="bi bi-download"></i>

    </button>

@endif

                                {{-- Delete --}}
                                <form
                                    action="{{ route('contracts.destroy',$contract->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
    type="button"
    class="action-btn delete-btn"
    data-bs-toggle="modal"
    data-bs-target="#deleteModal{{ $contract->id }}"
    title="Hapus">

    <i class="bi bi-trash"></i>

</button>

                                </form>

                            </div>

                        </td>

                    </tr>
                    <div class="modal fade" id="deleteModal{{ $contract->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus nomor kontrak
                <strong>{{ $contract->nomor_kontrak }}</strong>?
            </div>

            <div class="modal-footer">
                <button type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Batal
                </button>

                <form action="{{ route('contracts.destroy',$contract->id) }}"
                    method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Ya, Hapus
                    </button>

                </form>
            </div>

        </div>
    </div>
</div>

                @empty

                    <tr>

                        <td colspan="10"
                            class="text-center py-5 text-muted">

                            <i class="bi bi-folder2-open fs-1 d-block mb-2"></i>

                            Tidak ada data kontrak

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4 d-flex justify-content-end">
        {{ $contracts->links() }}
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
    min-width:150px;
    border-radius:12px;
}

.add-btn{
    border-radius:8px;
    padding:6px 12px;
    font-size:13px;
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
    letter-spacing:.5px;
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

.access-view{
    background:#fef3c7;
    color:#b45309;
    padding:7px 14px;
    border-radius:30px;
    font-size:13px;
    font-weight:500;
}

.access-full{
    background:#dcfce7;
    color:#15803d;
    padding:7px 14px;
    border-radius:30px;
    font-size:13px;
    font-weight:500;
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
    transition:.2s;
}

.view-btn{
    background:#ecfeff;
    color:#0891b2;
}

.view-btn:hover{
    background:#0891b2;
    color:white;
}

.edit-btn{
    background:#eef4ff;
    color:#2563eb;
}

.edit-btn:hover{
    background:#2563eb;
    color:white;
}

.download-btn{
    background:#ffffff;
    color:#2563eb;
}

.delete-btn{
    background:#fef2f2;
    color:#dc2626;
}

.delete-btn:hover{
    background:#dc2626;
    color:white;
}

.pagination{
    margin-bottom:0;
}

</style>
<script>
setTimeout(function() {
    let alertBox = document.getElementById('successAlert');

    if(alertBox){
        alertBox.remove();
    }
}, 3000);
</script>
@endsection
