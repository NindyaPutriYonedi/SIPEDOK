@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Data Serah Terima
            </h3>

            <small class="text-muted">
                Kelola data serah terima asbuilt
            </small>

        </div>

        @if(auth()->user()->role=='admin')

        <a href="/serah-terima/create"
           class="btn btn-primary add-btn">

            <i class="bi bi-plus-circle me-1"></i>
            Add Data

        </a>

        @endif

    </div>

    <div class="table-wrapper">

        <div class="table-responsive">

            <table class="table custom-table mb-0">

                <thead>

                <tr>

                    <th width="80">No</th>
                    <th>Tanggal Terima</th>
                    <th>Penerima</th>
                    <th>No Kontrak</th>
                    <th>Rekanan</th>
                    <th>Jumlah Asbuilt</th>
                    <th width="">Aksi</th>

                </tr>

                </thead>

                <tbody>

                @forelse($data as $row)

                <tr>

                    <td>

                        <span class="number-badge">
    {{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}
</span>

                    </td>

                    <td>

                        {{ date('d-m-Y', strtotime($row->tanggal_terima)) }}

                    </td>

                    <td>

                        <strong>
                            {{ $row->penerima }}
                        </strong>

                    </td>

                    <td>

    @foreach($row->asbuilt as $asbuilt)

        <span class="role-badge d-inline-block mb-1">
            {{ $asbuilt->no_kontrak }}
        </span><br>

    @endforeach

</td>

                    <td>

                        {{ $row->asbuilt->first()->rekanan ?? '-' }}

                    </td>

                    <td>

                        <span class="access-full">

                            {{ $row->jumlah_asbuilt }}

                        </span>

                    </td>

                    <td>

                        <div class="d-flex gap-2">

                            <a href="/serah-terima/{{ $row->id }}/edit"
                               class="action-btn edit-btn">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <a href="/serah-terima/{{ $row->id }}/print"
   target="_blank"
   class="action-btn print-btn">

                                <i class="bi bi-printer"></i>

                            </a>

                            @if(auth()->user()->role=='admin')

                            <form action="/serah-terima/{{ $row->id }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Hapus data?')"
                                        class="action-btn delete-btn">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                            @endif

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7"
                        class="text-center py-5 text-muted">

                        Tidak ada data

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4 d-flex justify-content-end">

        {{ $data->links() }}

    </div>

</div>

<style>

.search-box{
    width:280px;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 2px 8px rgba(0,0,0,.05);
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

.role-badge{
    display:inline-block;
    background:#eef2ff;
    color:#4338ca;
    padding:6px 12px;
    border-radius:8px;
    font-size:12px;
    font-weight:500;
    min-width:180px;
    margin-bottom:6px;
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

.edit-btn{
    background:#eef4ff;
    color:#2563eb;
}

.print-btn{
    background:#ecfeff;
    color:#0891b2;
}

.delete-btn{
    background:#fef2f2;
    color:#dc2626;
}

</style>

@endsection
