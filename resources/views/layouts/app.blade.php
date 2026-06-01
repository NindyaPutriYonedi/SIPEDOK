<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPEDOK</title>
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

    body{
        background:#eef2f7;
        margin:0;
        overflow-x:hidden;
    }

    .sidebar{
        width:270px;
        min-height:100vh;
        background:linear-gradient(180deg,#0d47a1,#003b8e);
        position:fixed;
        left:0;
        top:0;
    }

    .content{
        margin-left:270px;
    }

    .logo{
        color:white;
        padding:30px 20px;
        text-align:center;
    }

    .logo h2{
        font-weight:bold;
        margin-bottom:10px;
    }

    .logo small{
        font-size:14px;
        line-height:1.7;
    }

    .sidebar-menu-title{
        color:rgba(255,255,255,.7);
        font-size:13px;
        font-weight:bold;
        margin:20px 20px 10px;
        letter-spacing:1px;
    }

    .sidebar-menu{
        margin-top:20px;
    }

    .sidebar-menu a{
        display:block;
        margin:8px 15px;
        padding:14px 20px;
        border-radius:12px;
        color:white;
        text-decoration:none;
        transition:.3s;
    }

    .sidebar-menu a:hover{
        background:rgba(255,255,255,.15);
        color:white;
    }

    .sidebar-menu a.active{
        background:#0d6efd;
    }

    .topbar{
        background:white;
        height:70px;
        display:flex;
        align-items:center;
        justify-content:space-between;
        padding:0 30px;
        box-shadow:0 2px 10px rgba(0,0,0,.05);
    }

    .main-content{
        padding:30px;
    }

    .card{
        transition:.3s;
    }

    .card:hover{
        transform:translateY(-5px);
    }

    .sidebar-footer{
        position:absolute;
        bottom:20px;
        left:20px;
        color:white;
        font-size:13px;
    }

</style>

</head>
<body>

<div class="sidebar">

<div class="logo">
    <h2>SIPEDOK</h2>

    <small>
        Sistem Informasi <br>
        Pengelolaan Dokumen
    </small>

    <hr class="text-white mt-4">
</div>

<div class="sidebar-menu">

    <div class="sidebar-menu-title">
        MENU UTAMA
    </div>

    <a href="/dashboard" class="active">
        <i class="bi bi-house-door-fill me-2"></i>
        Dashboard
    </a>

    <a href="/mc0">
        <i class="bi bi-folder-fill me-2"></i>
        MC0
    </a>

    <a href="#">
        <i class="bi bi-file-earmark-text-fill me-2"></i>
        Data Kontrak
    </a>

    <a href="#">
        <i class="bi bi-clipboard-check-fill me-2"></i>
        Serah Terima
    </a>

    <a href="#">
        <i class="bi bi-journal-check me-2"></i>
        Serah Terima Asbuilt
    </a>

    <a href="#">
        <i class="bi bi-box-seam-fill me-2"></i>
        Peminjaman
    </a>

    <a href="#">
        <i class="bi bi-people-fill me-2"></i>
        User
    </a>

    <a href="#">
        <i class="bi bi-box-arrow-right me-2"></i>
        Logout
    </a>

</div>

<div class="sidebar-footer">
    © 2025 SIPEDOK <br>
    Perumda Air Minum Kota Padang
</div>
</div>

<div class="content">
<div class="topbar">

    <h4 class="mb-0">
        Dashboard
    </h4>

    <div>
        <i class="bi bi-person-circle me-1"></i>
        Admin
    </div>

</div>

<div class="main-content">
    @yield('content')
</div>

</div>

</body>
</html>
