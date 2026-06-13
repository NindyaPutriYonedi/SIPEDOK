@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm border-0 rounded-4">

        <div class="card-body p-4">

            <h3 class="fw-bold mb-1">
                Tambah User
            </h3>

            <p class="text-muted mb-4">
                Tambahkan akun pengguna baru ke sistem
            </p>

            <form action="/users" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        class="form-control rounded-3"
                        placeholder="Masukkan username"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control rounded-3"
                        placeholder="Masukkan password"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Role
                    </label>

                    <select
                        name="role"
                        class="form-select rounded-3"
                        required>

                        <option value="">
                            -- Pilih Role --
                        </option>

                        <option value="admin">
                            Admin
                        </option>

                        <option value="user">
                            User
                        </option>

                    </select>

                </div>

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Access Level
                    </label>

                    <select
                        name="access_level"
                        class="form-select rounded-3"
                        required>

                        <option value="">
                            -- Pilih Hak Akses --
                        </option>

                        <option value="view">
                            View
                        </option>

                        <option value="view_download">
                            View & Download
                        </option>

                    </select>

                </div>

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('users.index') }}"
                       class="btn btn-secondary rounded-3">

                        Kembali

                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary rounded-3">
                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
