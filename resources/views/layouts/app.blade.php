<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPEDOK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background: #eef2f7;
            margin: 0;
            overflow-x: hidden;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg, #0d47a1, #003b8e);
            position: fixed;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
        }

        .content {
            margin-left: 260px;
            min-height: 100vh;
        }

        .logo {
            color: white;
            padding: 20px;
            text-align: center;
        }

        .logo h2 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .logo small {
            font-size: 13px;
            line-height: 1.6;
        }

        .sidebar-menu-title {
            color: rgba(255, 255, 255, .7);
            font-size: 12px;
            font-weight: 700;
            margin: 15px 20px 10px;
            letter-spacing: 1px;
        }

        .sidebar-menu {
            flex: 1;
        }

        .sidebar-menu a {
            display: block;
            margin: 5px 12px;
            padding: 10px 16px;
            border-radius: 10px;
            color: white;
            text-decoration: none;
            transition: .3s;
            font-size: 15px;
        }

        .sidebar-menu a:hover {
            background: rgba(255, 255, 255, .15);
            color: white;
        }

        .sidebar-menu a.active {
            background: #0d6efd;
        }

        .topbar {
            background: white;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
        }

        .topbar h4 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }

        .main-content {
            padding: 25px;
        }

        .card {
            border: none !important;
            border-radius: 18px !important;
            transition: .3s;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .sidebar-footer {
            text-align: center;
            color: rgba(255, 255, 255, .75);
            font-size: 11px;
            padding: 12px;
            border-top: 1px solid rgba(255, 255, 255, .15);
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

            <hr class="text-white mt-3">

        </div>

        <div class="sidebar-menu">

            <div class="sidebar-menu-title">
                MENU UTAMA
            </div>

            <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-door-fill me-2"></i>
                Dashboard
            </a>

            <a href="/mc0" class="{{ request()->is('mc0*') ? 'active' : '' }}">
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
            © 2025 SIPEDOK
            <br>
            Perumda Air Minum Kota Padang
        </div>

    </div>

    <div class="content">
        @if (request()->is('dashboard'))
            <div class="topbar">

                <h4>Dashboard</h4>

                <div>
                    <i class="bi bi-person-circle me-1"></i>
                    Admin
                </div>

            </div>
        @endif

        <div class="main-content">
            @yield('content')
        </div>

    </div>


</body>

</html>
