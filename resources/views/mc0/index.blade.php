@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Data MC0</h2>
            <small class="text-muted">
                Data Master MC0
            </small>
        </div>

        <a href="/mc0/create" class="btn btn-primary">
            + Tambah Data
        </a>

    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Tanggal MC0</th>
                            <th>Lokasi</th>
                            <th>Pemohon</th>
                            <th>Area Pelayanan</th>
                            <th>Status Digitasi</th>
                            <th width="280">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tgl_mcu }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->pemohon }}</td>
                                <td>{{ $item->area_pelayanan }}</td>
                                <td>
                                    @if ($item->status_digitasi == 'Sudah Digitasi')
                                        <span class="badge bg-success">
                                            {{ $item->status_digitasi }}
                                        </span>
                                    @else
                                        <span class="badge bg-warning text-dark">
                                            {{ $item->status_digitasi }}
                                        </span>
                                    @endif

                                </td>

                                <td>
                                    <a href="/mc0/{{ $item->id }}" class="btn btn-info btn-sm">
                                        Detail
                                    </a>
                                    <a href="/mc0/{{ $item->id }}/edit" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    <form action="/mc0/{{ $item->id }}" method="POST" class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Hapus
                                        </button>

                                    </form>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    Belum ada data MC0
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
