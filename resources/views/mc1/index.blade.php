@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-0">Data MC1</h2>
        <small class="text-muted">
        </small>
    </div>

    <a href="/mc1/create" class="btn btn-primary">
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
                        <th>Tanggal MC1</th>
                        <th>Lokasi</th>
                        <th>Pemohon</th>
                        <th>Area Pelayanan</th>
                        <th>No Addendum</th>
                        <th>Dokumentasi</th>
                        <th width="280">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($data as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->tgl_mc1 }}</td>

                        <td>{{ $item->lokasi }}</td>

                        <td>{{ $item->pemohon }}</td>

                        <td>{{ $item->area_pelayanan }}</td>

                        <td>{{ $item->nomor_addendum }}</td>

                        <td>

                            @if($item->dokumentasi)

                                <img src="{{ asset('dokumentasi/'.$item->dokumentasi) }}"
                                     width="80"
                                     class="img-thumbnail">

                            @else

                                <span class="text-muted">
                                    Tidak Ada
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="/mc1/{{ $item->id }}"
                               class="btn btn-info btn-sm">
                                Detail
                            </a>

                            <a href="/mc1/{{ $item->id }}/edit"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="/mc1/{{ $item->id }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="8"
                            class="text-center py-4">

                            Belum ada data MC1

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
