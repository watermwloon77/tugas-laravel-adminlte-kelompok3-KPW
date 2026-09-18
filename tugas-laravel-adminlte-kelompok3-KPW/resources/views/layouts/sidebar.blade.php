@php
    $role = strtolower(optional(auth()->user()->role)->name ?? '');
@endphp

<aside class="app-sidebar bg-dark shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="#" class="brand-link">
            <span class="brand-text text-white fw-bold">
                <i class="fa-solid fa-store me-1 text-primary"></i> Kasir POS <span class="text-primary">Buket</span>
            </span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">

                <!-- Dashboard (Admin & Owner) -->
                @if(in_array($role, ['admin', 'owner']))
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-gauge-high text-primary"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @endif

                <!-- Kasir / Transaksi POS (Admin & Kasir) -->
                @if(in_array($role, ['admin', 'kasir']))
                <li class="nav-item">
                    <a href="{{ route('penjualan.create') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-cash-register text-primary"></i>
                        <p>Kasir / Transaksi POS</p>
                    </a>
                </li>
                @endif

                <!-- Data Produk (Admin & Kasir) -->
                @if(in_array($role, ['admin', 'kasir']))
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-box text-primary"></i>
                        <p>Data Produk</p>
                    </a>
                </li>
                @endif

                <!-- Data Kategori (Khusus Admin) -->
                @if($role === 'admin')
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-tags text-primary"></i>
                        <p>Data Kategori</p>
                    </a>
                </li>
                @endif

                <!-- Laporan Penjualan (Admin & Owner) -->
                @if(in_array($role, ['admin', 'owner']))
                <li class="nav-item">
                    <a href="{{ route('laporan.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-file-invoice-dollar text-primary"></i>
                        <p>Laporan Penjualan</p>
                    </a>
                </li>
                @endif

                <!-- Kelola User (Khusus Admin) -->
                @if($role === 'admin')
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-users text-primary"></i>
                        <p>Kelola User</p>
                    </a>
                </li>
                @endif

                <!-- Logout Secure -->
                <li class="nav-header text-uppercase mt-3 ms-3" style="font-size: 0.75rem;">Akses</li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                        <button type="submit" class="nav-link text-danger bg-transparent border-0 w-100 text-start">
                            <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                            <p>Logout</p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>