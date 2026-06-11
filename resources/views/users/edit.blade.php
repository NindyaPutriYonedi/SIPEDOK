@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm border-0 rounded-4">

        <div class="card-body p-4">

            <h3 class="fw-bold mb-1">
                Edit User
            </h3>

            <p class="text-muted mb-4">
                Perbarui informasi akun pengguna
            </p>

            <form action="/users/{{ $user->id }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        value="{{ $user->username }}"
                        class="form-control rounded-3"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Password Baru
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control rounded-3">

                    <small class="text-muted">
                        Kosongkan jika password tidak ingin diubah
                    </small>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Role
                    </label>

                    <select
                        name="role"
                        class="form-select rounded-3"
                        required>

                        <option
                            value="admin"
                            {{ $user->role == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option
                            value="user"
                            {{ $user->role == 'user' ? 'selected' : '' }}>
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

                        <option
                            value="view"
                            {{ $user->access_level == 'view' ? 'selected' : '' }}>
                            View
                        </option>

                        <option
                            value="view_download"
                            {{ $user->access_level == 'view_download' ? 'selected' : '' }}>
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
                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
