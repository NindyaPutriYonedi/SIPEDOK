@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm border-0 rounded-4">

        <h3>
            Tambah Data Kontrak
        </h3>
        <div class="card-body">

            <form action="{{ route('contracts.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    {{-- Tanggal Terima --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Tanggal Terima
                        </label>
                        <input type="date"
                               name="tanggal_terima"
                               class="form-control"
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
                               placeholder=""
                               min="2000"
                               max="2100"
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
                               placeholder=""
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
                                  required></textarea>
                    </div>

                    {{-- Tanggal Mulai --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Tanggal Mulai
                        </label>
                        <input type="date"
                               name="tanggal_mulai"
                               class="form-control"
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

                            <option value="">
                                -- Pilih Status --
                            </option>

                            <option value="Sudah">
                                Sudah
                            </option>

                            <option value="Belum">
                                Belum
                            </option>

                        </select>
                    </div>

                    {{-- Upload Berkas --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Upload Berkas
                        </label>

                        <input type="file"
                               name="berkas"
                               class="form-control"
                               accept=".pdf,.doc,.docx,.xls,.xlsx">

                        <small class="text-muted">
                            Format yang diperbolehkan:
                            PDF, DOC, DOCX, XLS, XLSX
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
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
