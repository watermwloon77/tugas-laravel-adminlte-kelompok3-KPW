<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Kasir POS Toko Buket</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome (Ikon) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.1/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #23303a 0%, #35495e 55%, #0d6efd 140%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            color: #212529;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            border-radius: 14px;
            background: #ffffff;
            border: none;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
        }

        .brand-title {
            font-weight: 800;
            font-size: 24px;
            letter-spacing: 0.5px;
            margin: 0;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.15);
        }

        .demo-table th {
            background-color: #f1f3f5;
            font-size: 12px;
            text-transform: uppercase;
            color: #495057;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center p-3">

    <div style="width:100%; max-width:420px;">
        <div class="card login-card">
            <!-- Header Card -->
            <div class="card-header text-center py-4" style="background:#212529; color:#fff;">
                <div class="mb-2">
                    <i class="fa-solid fa-store fs-1 text-primary"></i>
                </div>
                <h1 class="brand-title">Kasir POS <span class="text-primary">Toko Buket</span></h1>
                <small class="text-white-50">Sistem Kasir & Manajemen Toko Buket - Kelompok 3</small>
            </div>

            <!-- Body Card -->
            <div class="card-body p-4">
                <p class="text-center text-secondary small fw-semibold mb-4">
                    Sign in untuk masuk ke sistem
                </p>

                <!-- Alert Notifikasi Jika Error -->
                @if ($errors->any())
                    <div class="alert alert-danger p-2 small mb-3">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ url('/login') }}" method="POST">
                    @csrf

                    <!-- Input Email -->
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-dark">Email</label>
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" placeholder="contoh@gmail.com" value="{{ old('email') }}" required>
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div>
                    </div>

                    <!-- Input Password -->
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-dark">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" class="btn btn-primary w-100 fw-bold">
                        Sign In <i class="fa-solid fa-right-to-bracket ms-1"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Panel Kredensial Demo -->
        <div class="card login-card mt-3">
            <div class="card-body p-3">
                <p class="fw-bold small mb-2 text-center text-primary">Akun Demo &mdash; password: <code>password</code></p>
                <table class="table table-sm small mb-0 demo-table">
                    <thead>
                        <tr><th>Role</th><th>Email</th></tr>
                    </thead>
                    <tbody>
                        <tr><td><span class="badge bg-primary">Admin</span></td><td>admin@gmail.com</td></tr>
                        <tr><td><span class="badge bg-success">Kasir</span></td><td>kasir@gmail.com</td></tr>
                        <tr><td><span class="badge bg-dark">Owner</span></td><td>owner@gmail.com</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>