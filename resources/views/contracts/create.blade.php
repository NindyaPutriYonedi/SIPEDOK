@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="mb-4">

        <h3 class="fw-bold mb-1">
            Tambah Kontrak
        </h3>

        <small class="text-muted">
            Tambahkan data kontrak baru
        </small>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('contracts.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                    {{-- Tanggal Terima --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Tanggal Terima
                        </label>

                        <input
                            type="date"
                            name="tanggal_terima"
                            class="form-control @error('tanggal_terima') is-invalid @enderror"
                            value="{{ old('tanggal_terima') }}"
                            required>

                        @error('tanggal_terima')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Tahun Kontrak --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Tahun Kontrak
                        </label>

                        <input
                            type="number"
                            name="tahun_kontrak"
                            class="form-control @error('tahun_kontrak') is-invalid @enderror"
                            value="{{ old('tahun_kontrak') }}"
                            placeholder="Contoh : 2025"
                            required>

                        @error('tahun_kontrak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Nomor Kontrak --}}
                    <div class="col-md-12">

                        <label class="form-label">
                            Nomor Kontrak
                        </label>

                        <input
                            type="text"
                            name="nomor_kontrak"
                            class="form-control @error('nomor_kontrak') is-invalid @enderror"
                            value="{{ old('nomor_kontrak') }}"
                            required>

                        @error('nomor_kontrak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Lokasi --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Lokasi
                        </label>

                        <input
                            type="text"
                            name="lokasi"
                            class="form-control @error('lokasi') is-invalid @enderror"
                            value="{{ old('lokasi') }}"
                            required>

                        @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Pelaksana --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Pelaksana
                        </label>

                        <input
                            type="text"
                            name="pelaksana"
                            class="form-control @error('pelaksana') is-invalid @enderror"
                            value="{{ old('pelaksana') }}"
                            required>

                        @error('pelaksana')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Pekerjaan --}}
                    <div class="col-md-12">

                        <label class="form-label">
                            Pekerjaan
                        </label>

                        <textarea
                            name="pekerjaan"
                            rows="3"
                            class="form-control @error('pekerjaan') is-invalid @enderror"
                            required>{{ old('pekerjaan') }}</textarea>

                        @error('pekerjaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Tanggal Mulai --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            class="form-control @error('tanggal_mulai') is-invalid @enderror"
                            value="{{ old('tanggal_mulai') }}"
                            required>

                        @error('tanggal_mulai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Tanggal Berakhir --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Tanggal Berakhir
                        </label>

                        <input
                            type="date"
                            name="tanggal_berakhir"
                            class="form-control @error('tanggal_berakhir') is-invalid @enderror"
                            value="{{ old('tanggal_berakhir') }}"
                            required>

                        @error('tanggal_berakhir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Digitasi --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Status Digitasi
                        </label>

                        <select
                            name="digitasi"
                            class="form-select @error('digitasi') is-invalid @enderror"
                            required>

                            <option value="">
                                Pilih Status
                            </option>

                            <option value="Sudah">
                                Sudah
                            </option>

                            <option value="Belum">
                                Belum
                            </option>

                        </select>

                        @error('digitasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Upload PDF --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Upload Berkas PDF
                        </label>

                        <input
                            type="file"
                            name="berkas"
                            accept=".pdf"
                            class="form-control @error('berkas') is-invalid @enderror"
                            required>

                        @error('berkas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <div class="mt-4 d-flex gap-2">

                    <a href="{{ route('contracts.index') }}"
                        class="btn btn-secondary">

                        Kembali

                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
