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
    
    <!-- FIX DOUBLE SCROLLBAR DI SINI -->
    <style>
        html, body {
            height: auto !important;
            min-height: 100vh;
            overflow-x: hidden;
            overflow-y: auto !important; /* Hanya browser yang scroll */
        }

        .app-wrapper {
            min-height: 100vh;
            height: auto !important;
            overflow: visible !important; /* Matikan scroll internal wrapper */
        }

        .app-main {
            overflow: visible !important; /* Matikan scroll internal main kontainer */
        }
    </style>

    <!-- Custom CSS dari Halaman Lain jika Ada -->
    @stack('css')
</head>
<body class="sidebar-expand-lg bg-body-tertiary"> <!-- "layout-fixed" Dihapus agar tidak konflik -->
    <div class="app-wrapper">

        <!-- 1. NAVBAR (Bagian Atas) -->
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- 2. SIDEBAR (Bagian Kiri) -->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="#" class="brand-link">
                    <span class="brand-text fw-light"><b>Kelompok 3</b> Admin</span>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-gauge-high"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/users') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-users"></i>
                                <p>Data User / Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/laporan') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-table"></i>
                                <p>Laporan Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/form') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-pen-to-square"></i>
                                <p>Form Input</p>
                            </a>
                        </li>
                        <li class="nav-item mt-3">
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
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">@yield('page_heading', 'Dashboard')</h3>
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

        <!-- 4. FOOTER (Bagian Bawah) -->
        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline">Tugas KPW 2026</div>
            <strong>Copyright &copy; 2026 Kelompok 3.</strong> All rights reserved.
        </footer>

    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE v4 JS -->
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
    
    @stack('js')
</body>
</html>