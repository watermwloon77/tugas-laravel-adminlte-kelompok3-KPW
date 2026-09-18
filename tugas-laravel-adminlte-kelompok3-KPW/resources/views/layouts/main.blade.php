<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Kasir POS Toko Buket')</title>

    <!-- AdminLTE v4 CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.css') }}">

    <!-- FontAwesome (Ikon) via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.1/css/all.min.css">

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

        /* Menu aktif di sidebar memakai warna primary (biru) agar kontras */
        .nav-sidebar .nav-link.active,
        .sidebar-menu .nav-link.active {
            background-color: var(--bs-primary) !important;
            color: #fff !important;
            font-weight: bold;
        }

        .nav-sidebar .nav-link:hover,
        .sidebar-menu .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.08);
        }
    </style>

    @stack('css')
</head>
<body class="sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">

        <!-- 1. NAVBAR (Header Atas) -->
        <nav class="app-header navbar navbar-expand bg-dark shadow-sm" data-bs-theme="dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <span class="nav-link fw-semibold">
                            <i class="fa-solid fa-store me-1 text-primary"></i> Kasir POS Toko Buket
                        </span>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- Tombol Mode Gelap / Terang -->
                    <li class="nav-item me-2">
                        <button type="button" id="theme-toggle" class="btn btn-sm btn-outline-light" title="Ganti mode gelap/terang">
                            <i id="icon-sun" class="fa-solid fa-sun"></i>
                            <i id="icon-moon" class="fa-solid fa-moon d-none"></i>
                        </button>
                    </li>
                    <li class="nav-item">
                        <span class="badge bg-primary text-white p-2 me-2">
                            <i class="fa-solid fa-user me-1"></i> {{ auth()->user()->name ?? 'Guest' }} ({{ ucfirst(optional(auth()->user()->role)->name ?? 'User') }})
                        </span>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- 2. SIDEBAR -->
        @include('layouts.sidebar')

        <!-- 3. KONTEN UTAMA -->
        <main class="app-main">
            <div class="app-content-header pt-3 pb-2">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0 fw-bold">
                                @yield('page_heading', 'Dashboard')
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                            <i class="fa-solid fa-circle-check me-1"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                            <i class="fa-solid fa-circle-exclamation me-1"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                            <i class="fa-solid fa-triangle-exclamation me-1"></i>
                            <strong>Terjadi kesalahan pada form:</strong>
                            <ul class="mb-0 mt-1 ps-3">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </main>

        <!-- 4. FOOTER -->
        <footer class="app-footer border-top p-3">
            <div class="float-end d-none d-sm-inline">
                <b>Tugas KPW</b> 2026
            </div>
            <strong>Copyright &copy; 2026 <a href="#" class="text-primary text-decoration-none fw-bold">Kelompok 3</a>.</strong> All rights reserved.
        </footer>

    </div>

    <!-- JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>

    <script>
        // ====== Mode Gelap / Terang ======
        (function () {
            var root = document.documentElement;
            var sun = document.getElementById('icon-sun');
            var moon = document.getElementById('icon-moon');

            function apply(theme) {
                root.setAttribute('data-bs-theme', theme);
                localStorage.setItem('lte-theme', theme);
                if (theme === 'dark') {
                    moon.classList.remove('d-none');
                    sun.classList.add('d-none');
                } else {
                    moon.classList.add('d-none');
                    sun.classList.remove('d-none');
                }
            }

            apply(localStorage.getItem('lte-theme') || 'light');

            document.getElementById('theme-toggle').addEventListener('click', function () {
                var current = root.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
                apply(current);
            });
        })();
    </script>

    @stack('js')
</body>
</html>