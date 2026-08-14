<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Project Kelompok 3')</title>

    <!-- AdminLTE v4 CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.css') }}">
    
    <!-- FontAwesome (Ikon) via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.1/css/all.min.css">
    
    <!-- Custom Style Tema Kuning & Fix Layout -->
    <style>
        html, body {
            height: auto !important;
            min-height: 100vh;
            overflow-x: hidden;
            overflow-y: auto !important;
        }

        .app-wrapper {
            min-height: 100vh;
            height: auto !important;
            overflow: visible !important;
        }

        .app-main {
            overflow: visible !important;
        }

        /* Custom Styling Tema Kuning Cerah */
        .bg-warning-custom {
            background-color: #ffc107 !important;
            color: #212529 !important;
        }

        .sidebar-brand {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-sidebar .nav-link.active {
            background-color: #ffc107 !important;
            color: #000 !important;
            font-weight: bold;
        }
    </style>

    @stack('css')
</head>
<body class="sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">

        <!-- 1. NAVBAR (Header Atas - Tema Kuning) -->
        <nav class="app-header navbar navbar-expand bg-warning-custom shadow-sm">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bold" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a href="#" class="nav-link text-dark fw-semibold">
                            <i class="fa-solid fa-house me-1"></i> Beranda Admin
                        </a>
                    </li>
                </ul>

                <!-- Profil Singkat / Badge Nabila -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="badge bg-dark text-warning p-2 me-2">
                            <i class="fa-solid fa-code-branch me-1"></i> Maintainer: Nabila
                        </span>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- 2. SIDEBAR (Navigasi Kiri) -->
        <aside class="app-sidebar bg-dark shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="#" class="brand-link">
                    <span class="brand-text text-warning fw-bold">
                        <i class="fa-solid fa-lemon me-1"></i> Kelompok 3 Admin
                    </span>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-gauge-high text-warning"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/users') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-users text-warning"></i>
                                <p>Data User / Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/laporan') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-table text-warning"></i>
                                <p>Laporan Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/form') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-pen-to-square text-warning"></i>
                                <p>Form Input</p>
                            </a>
                        </li>
                        
                        <li class="nav-header text-uppercase text-secondary mt-3 ms-3" style="font-size: 0.75rem;">Akses</li>
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link text-danger">
                                <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- 3. KONTEN UTAMA -->
        <main class="app-main">
            <div class="app-content-header pt-3 pb-2">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0 text-dark fw-bold">
                                @yield('page_heading', 'Dashboard')
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="app-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>

        <!-- 4. FOOTER -->
        <footer class="app-footer bg-light border-top">
            <div class="float-end d-none d-sm-inline">
                <b>Tugas KPW</b> 2026
            </div>
            <strong>Copyright &copy; 2026 <a href="#" class="text-warning text-decoration-none fw-bold">Kelompok 3</a>.</strong> All rights reserved.
        </footer>

    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE v4 JS -->
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
    
    @stack('js')
</body>
</html>