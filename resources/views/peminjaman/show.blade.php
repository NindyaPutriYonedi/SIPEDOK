@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-0">Detail Peminjaman</h2>
            <small class="text-muted">
                Informasi Lengkap Data Peminjaman
            </small>
        </div>

        <a href="/peminjaman" class="btn btn-secondary">
            Kembali
        </a>

    </div>

    <!-- DATA PEMINJAMAN -->

    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-header bg-primary text-white">
            <i class="bi bi-info-circle me-2"></i>
            Data Peminjaman
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <strong>Tanggal Pinjam</strong>
                    <br>
                    {{ $data->tanggal_pinjam }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Nama Peminjam</strong>
                    <br>
                    {{ $data->peminjam }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Tanggal Kembali</strong>
                    <br>
                    {{ $data->tanggal_kembali ?? '-' }}
                </div>

                <div class="col-md-3 mb-3">
                    <strong>Status</strong>
                    <br>

                    @if ($data->status == 'Dikembalikan')
                        <span class="badge bg-success">
                            {{ $data->status }}
                        </span>
                    @else
                        <span class="badge bg-warning text-dark">
                            {{ $data->status }}
                        </span>
                    @endif

                </div>

                <div class="col-md-3 mb-3">
                    <strong>Jumlah Kontrak</strong>
                    <br>

                    <span class="badge bg-primary">
                        {{ $data->jumlah_kontrak }}
                    </span>

                </div>

            </div>

        </div>

    </div>

    <!-- TAMBAH KONTRAK -->

    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-header bg-primary text-white">
            <i class="bi bi-plus-circle me-2"></i>
            Tambah Kontrak
        </div>

        <div class="card-body">

            <form action="/peminjaman-detail/store" method="POST">

                @csrf

                <input type="hidden" name="peminjaman_id" value="{{ $data->id }}">

                <div class="row">

                    <div class="col-md-5">

                        <label class="form-label">
                            Nomor Kontrak
                        </label>

                        <input type="text" name="nomor_kontrak" class="form-control" required>

                    </div>

                    <div class="col-md-5">

                        <label class="form-label">
                            Keterangan
                        </label>

                        <input type="text" name="keterangan" class="form-control">

                    </div>

                    <div class="col-md-2 d-flex align-items-end">

                        <button type="submit" class="btn btn-primary w-100">

                            Tambah

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- DAFTAR KONTRAK -->

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-primary text-white">
            <i class="bi bi-list-ul me-2"></i>
            Daftar Kontrak Yang Dipinjam
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">

                        <tr>
                            <th width="70">No</th>
                            <th>Nomor Kontrak</th>
                            <th>Keterangan</th>
                            <th width="150">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data->detail as $item)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->nomor_kontrak }}</td>

                                <td>{{ $item->keterangan ?? '-' }}</td>

                                <td>

                                    <a href="/peminjaman-detail/{{ $item->id }}/edit" class="btn btn-warning btn-sm">

                                        Edit

                                    </a>

                                    <form action="/peminjaman-detail/{{ $item->id }}" method="POST" class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus kontrak?')">

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="text-center text-muted">

                                    Belum ada data kontrak

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
