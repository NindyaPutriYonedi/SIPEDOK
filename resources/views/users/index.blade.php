@extends('layouts.app')

@section('content')

<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1 text-dark">
                Data User
            </h3>

            <small class="text-muted">
                Kelola pengguna dan hak akses sistem
            </small>
        </div>

        <div class="d-flex align-items-center gap-3">

            <form>
                <div class="input-group search-box">

                    <input
                        type="text"
                        name="keyword"
                        class="form-control border-0"
                        placeholder="Search">

                    <button class="btn">
                        <i class="bi bi-search"></i>
                    </button>

                </div>
            </form>

            <a href="/users/create"
               class="btn btn-primary add-btn">

                <i class="bi bi-plus-circle me-1"></i>
                Add User

            </a>

        </div>

    </div>

    {{-- Table --}}
    <div class="table-wrapper">

        <div class="table-responsive">

            <table class="table custom-table mb-0">

                <thead>

                    <tr>
                        <th width="80">No</th>
                        <th>Username</th>
                        <th width="280">Role</th>
                        <th width="220">Access Level</th>
                        <th width="140">Actions</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($users as $user)

                <tr>

                    <td>
                        <span class="number-badge">
                            {{ $loop->iteration }}
                        </span>
                    </td>

                    <td>

                        <div class="fw-semibold text-dark">
                            {{ $user->username }}
                        </div>

                    </td>

                    <td>

                        <span class="role-badge">
                            {{ ucfirst($user->role) }}
                        </span>

                    </td>

                    <td>

                        @if($user->access_level == 'view')

                            <span class="access-view">
                                Hanya Melihat
                            </span>

                        @elseif($user->access_level == 'download')

                            <span class="access-download">
                                Melihat & Download
                            </span>

                        @else

                            <span class="access-full">
                                Full Access
                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="d-flex align-items-center gap-2">

                            <a href="/users/{{$user->id}}/edit"
                               class="action-btn edit-btn"
                               title="Edit">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <form action="/users/{{$user->id}}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Hapus data?')"
                                    class="action-btn delete-btn"
                                    title="Hapus">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center py-5 text-muted">

                        <i class="bi bi-people fs-1 d-block mb-2"></i>

                        Tidak ada data user

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4 d-flex justify-content-end">
        {{ $users->links() }}
    </div>

</div>

<style>

.search-box{
    width:280px;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 2px 8px rgba(0,0,0,.05);
}

.add-btn{
    border-radius:12px;
    padding:10px 18px;
    font-weight:500;
}

.table-wrapper{
    background:#fff;
    border-radius:18px;
    overflow:hidden;
    border:1px solid #e5e7eb;
    box-shadow:0 10px 25px rgba(0,0,0,.05);
}

.custom-table thead{
    background:#f8fafc;
}

.custom-table thead th{
    padding:18px;
    border:none;
    font-size:13px;
    font-weight:600;
    color:#64748b;
    text-transform:uppercase;
    letter-spacing:.5px;
}

.custom-table tbody td{
    padding:18px;
    vertical-align:middle;
    border-top:1px solid #f1f5f9;
}

.custom-table tbody tr{
    transition:.2s;
}

.custom-table tbody tr:hover{
    background:#fafcff;
}

.number-badge{
    width:34px;
    height:34px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    background:#eef4ff;
    color:#2563eb;
    font-weight:600;
}

.role-badge{
    background:#f1f5f9;
    color:#475569;
    padding:7px 14px;
    border-radius:30px;
    font-size:13px;
    font-weight:500;
}

.access-view{
    background:#fef3c7;
    color:#b45309;
    padding:7px 14px;
    border-radius:30px;
    font-size:13px;
    font-weight:500;
}

.access-download{
    background:#dbeafe;
    color:#1d4ed8;
    padding:7px 14px;
    border-radius:30px;
    font-size:13px;
    font-weight:500;
}

.access-full{
    background:#dcfce7;
    color:#15803d;
    padding:7px 14px;
    border-radius:30px;
    font-size:13px;
    font-weight:500;
}

.action-btn{
    width:38px;
    height:38px;
    display:flex;
    align-items:center;
    justify-content:center;
    border:none;
    border-radius:10px;
    text-decoration:none;
    transition:.2s;
}

.edit-btn{
    background:#eef4ff;
    color:#2563eb;
}

.edit-btn:hover{
    background:#2563eb;
    color:white;
}

.delete-btn{
    background:#fef2f2;
    color:#dc2626;
}

.delete-btn:hover{
    background:#dc2626;
    color:white;
}

.pagination{
    margin-bottom:0;
}

</style>
<script>
setTimeout(function() {
    let alertBox = document.getElementById('successAlert');

    if(alertBox){
        alertBox.remove();
    }
}, 3000);
</script>
@endsection
