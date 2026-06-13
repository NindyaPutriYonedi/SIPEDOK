@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm border-0 rounded-4">

        <h3 class="p-3 mb-0">
            Edit Data Kontrak
        </h3>

        <div class="card-body">

            <form action="{{ route('contracts.update', $contract->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Tanggal Terima --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Tanggal Terima
                        </label>
                        <input type="date"
                               name="tanggal_terima"
                               class="form-control"
                               value="{{ $contract->tanggal_terima }}"
                               required>
                    </div>

                    {{-- Tahun Kontrak --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Tahun Kontrak
                        </label>
                        <input type="number"
                               name="tahun_kontrak"
                               class="form-control"
                               min="2000"
                               max="2100"
                               value="{{ $contract->tahun_kontrak }}"
                               required>
                    </div>

                    {{-- Nomor Kontrak --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Nomor Kontrak
                        </label>
                        <input type="text"
                               name="nomor_kontrak"
                               class="form-control"
                               value="{{ $contract->nomor_kontrak }}"
                               required>
                    </div>

                    {{-- Lokasi --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Lokasi
                        </label>
                        <input type="text"
                               name="lokasi"
                               class="form-control"
                               value="{{ $contract->lokasi }}"
                               required>
                    </div>

                    {{-- Pekerjaan --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Pekerjaan
                        </label>
                        <textarea name="pekerjaan"
                                  rows="3"
                                  class="form-control"
                                  required>{{ $contract->pekerjaan }}</textarea>
                    </div>

                    {{-- Tanggal Mulai --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Tanggal Mulai
                        </label>
                        <input type="date"
                               name="tanggal_mulai"
                               class="form-control"
                               value="{{ $contract->tanggal_mulai }}"
                               required>
                    </div>

                    {{-- Tanggal Berakhir --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Tanggal Berakhir
                        </label>
                        <input type="date"
                               name="tanggal_berakhir"
                               class="form-control"
                               value="{{ $contract->tanggal_berakhir }}"
                               required>
                    </div>

                    {{-- Pelaksana --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Pelaksana
                        </label>
                        <input type="text"
                               name="pelaksana"
                               class="form-control"
                               value="{{ $contract->pelaksana }}"
                               required>
                    </div>

                    {{-- Digitasi --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Digitasi
                        </label>

                        <select name="digitasi"
                                class="form-select"
                                required>

                            <option value="Sudah"
                                {{ $contract->digitasi == 'Sudah' ? 'selected' : '' }}>
                                Sudah
                            </option>

                            <option value="Belum"
                                {{ $contract->digitasi == 'Belum' ? 'selected' : '' }}>
                                Belum
                            </option>

                        </select>

                    </div>

                    {{-- Berkas --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Upload Berkas Baru
                        </label>

                        <input type="file"
                               name="berkas"
                               class="form-control"
                               accept=".pdf,.doc,.docx,.xls,.xlsx">

                        @if($contract->berkas)

                            <div class="mt-2">

                                <small class="text-success">
                                    File saat ini tersedia
                                </small>

                                <br>

                                <a href="{{ url('/contracts/download/'.$contract->id) }}"
                                   target="_blank">

                                    Download File Saat Ini

                                </a>

                            </div>

                        @endif

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti file.
                        </small>

                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('contracts.index') }}"
                       class="btn btn-secondary">

                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
