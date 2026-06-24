@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Edit Kontrak
            </h3>

            <small class="text-muted">
                Ubah data kontrak
            </small>

        </div>

        <a href="{{ route('contracts.index') }}"
           class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali

        </a>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('contracts.update',$contract->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    <div class="col-md-6">

                        <label class="form-label">
                            Tanggal Terima
                        </label>

                        <input
                            type="date"
                            name="tanggal_terima"
                            class="form-control @error('tanggal_terima') is-invalid @enderror"
                            value="{{ old('tanggal_terima',$contract->tanggal_terima) }}"
                            required>

                        @error('tanggal_terima')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Tahun Kontrak
                        </label>

                        <input
                            type="number"
                            name="tahun_kontrak"
                            class="form-control @error('tahun_kontrak') is-invalid @enderror"
                            value="{{ old('tahun_kontrak',$contract->tahun_kontrak) }}"
                            required>

                        @error('tahun_kontrak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-md-12">

                        <label class="form-label">
                            Nomor Kontrak
                        </label>

                        <input
                            type="text"
                            name="nomor_kontrak"
                            class="form-control @error('nomor_kontrak') is-invalid @enderror"
                            value="{{ old('nomor_kontrak',$contract->nomor_kontrak) }}"
                            required>

                        @error('nomor_kontrak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Lokasi
                        </label>

                        <input
                            type="text"
                            name="lokasi"
                            class="form-control @error('lokasi') is-invalid @enderror"
                            value="{{ old('lokasi',$contract->lokasi) }}"
                            required>

                        @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Pelaksana
                        </label>

                        <input
                            type="text"
                            name="pelaksana"
                            class="form-control @error('pelaksana') is-invalid @enderror"
                            value="{{ old('pelaksana',$contract->pelaksana) }}"
                            required>

                        @error('pelaksana')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-md-12">

                        <label class="form-label">
                            Pekerjaan
                        </label>

                        <textarea
                            name="pekerjaan"
                            rows="3"
                            class="form-control @error('pekerjaan') is-invalid @enderror"
                            required>{{ old('pekerjaan',$contract->pekerjaan) }}</textarea>

                        @error('pekerjaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            class="form-control @error('tanggal_mulai') is-invalid @enderror"
                            value="{{ old('tanggal_mulai',$contract->tanggal_mulai) }}"
                            required>

                        @error('tanggal_mulai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Tanggal Berakhir
                        </label>

                        <input
                            type="date"
                            name="tanggal_berakhir"
                            class="form-control @error('tanggal_berakhir') is-invalid @enderror"
                            value="{{ old('tanggal_berakhir',$contract->tanggal_berakhir) }}"
                            required>

                        @error('tanggal_berakhir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Status Digitasi
                        </label>

                        <select
                            name="digitasi"
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

                    <div class="col-md-6">

                        <label class="form-label">
                            Upload Berkas PDF
                        </label>

                        <input
                            type="file"
                            name="berkas"
                            accept=".pdf"
                            class="form-control">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti berkas
                        </small>

                    </div>

                    <div class="col-md-12">

                        <label class="form-label">
                            Berkas Saat Ini
                        </label>

                        <div>

                            <a href="{{ asset('uploads/contracts/'.$contract->berkas) }}"
                               target="_blank"
                               class="btn btn-outline-primary">

                                <i class="bi bi-file-earmark-pdf"></i>
                                Lihat PDF

                            </a>

                        </div>

                    </div>

                </div>

                <div class="mt-4 d-flex gap-2">

                    <a href="{{ route('contracts.index') }}"
                       class="btn btn-secondary">

                        Batal

                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
