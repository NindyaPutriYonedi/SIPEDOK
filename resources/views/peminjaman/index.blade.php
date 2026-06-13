@extends('layouts.app')

@section('content')

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

{{ session('success') }}

<button type="button"
        class="btn-close"
        data-bs-dismiss="alert">
</button>

</div>

@endif

<div class="d-flex justify-content-between align-items-center mb-4">

<div>

    <h2 class="fw-bold mb-0">
        Data Peminjaman
    </h2>

    <small class="text-muted">
        Daftar Data Peminjaman Dokumen
    </small>

</div>

<a href="/peminjaman/create"
   class="btn btn-primary">

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

                    <th>Tanggal Pinjam</th>

                    <th>Peminjam</th>

                    <th>Tanggal Kembali</th>

                    <th>Status</th>

                    <th>Jumlah Kontrak</th>

                    <th width="320">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($data as $item)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $item->tanggal_pinjam }}
                    </td>

                    <td>
                        {{ $item->peminjam }}
                    </td>

                    <td>
                        {{ $item->tanggal_kembali }}
                    </td>

                    <td>

                        @if($item->status == 'Dikembalikan')

                            <span class="badge bg-success">

                                {{ $item->status }}

                            </span>

                        @else

                            <span class="badge bg-warning text-dark">

                                {{ $item->status }}

                            </span>

                        @endif

                    </td>

                    <td>

                        <span class="badge bg-primary">

                            {{ $item->jumlah_kontrak }}

                        </span>

                    </td>

                    <td>

                        <a href="/peminjaman/{{ $item->id }}"
                           class="btn btn-info btn-sm">

                            Detail

                        </a>

                        <a href="/peminjaman/{{ $item->id }}/edit"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <a href="/peminjaman/{{ $item->id }}/print"
                           class="btn btn-secondary btn-sm">

                            Print

                        </a>

                        <form action="/peminjaman/{{ $item->id }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7"
                        class="text-center py-4">

                        Belum ada data peminjaman

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection
