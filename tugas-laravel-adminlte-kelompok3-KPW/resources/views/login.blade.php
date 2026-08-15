<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login System | Kelompok 3</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome (Ikon) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.1/css/all.min.css">

    <style>
        body {
            /* Background Gradasi Soft Dark Amber ke Warm Gold */
            background: linear-gradient(135deg, #18181b 0%, #27272a 40%, #78350f 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            border-radius: 16px;
            background: #ffffff;
            border: none;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.35);
        }

        /* Top Bar Header Gradasi Warm Amber - Gold */
        .card-header-custom {
            background: linear-gradient(90deg, #1c1917 0%, #78350f 100%);
            padding: 30px 20px;
            text-align: center;
            color: #ffffff;
            border-bottom: 4px solid #f59e0b; /* Accent Line Amber Gold */
        }

        .brand-title {
            font-weight: 800;
            font-size: 28px;
            letter-spacing: 1px;
            margin: 0;
        }

        .form-control {
            border-radius: 8px 0 0 8px;
            border: 1.5px solid #cbd5e1;
            padding: 11px 15px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
        }

        .input-group-text {
            border-radius: 0 8px 8px 0;
            background-color: #fef3c7;
            border: 1.5px solid #cbd5e1;
            border-left: none;
            color: #b45309; /* Warna Ikon Amber / Cokelat Emas */
        }

        /* Tombol Utama Gradasi Amber / Gold */
        .btn-amber-gradient {
            background: linear-gradient(90deg, #f59e0b 0%, #d97706 100%);
            border: none;
            border-radius: 8px;
            color: #ffffff;
            font-weight: 700;
            padding: 12px;
            font-size: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.35);
        }

        .btn-amber-gradient:hover {
            background: linear-gradient(90deg, #d97706 0%, #b45309 100%);
            transform: translateY(-1px);
            box-shadow: 0 6px 15px rgba(217, 119, 6, 0.45);
            color: #ffffff;
        }

        .form-check-input:checked {
            background-color: #f59e0b;
            border-color: #f59e0b;
        }

        .link-register {
            color: #d97706;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
        }

        .link-register:hover {
            color: #78350f;
            text-decoration: underline;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center p-3">

    <div class="card login-card">
        <!-- Header Card (Amber & Gold) -->
        <div class="card-header-custom">
            <div class="mb-2">
                <i class="fa-solid fa-layer-group fs-1 text-warning"></i>
            </div>
            <h1 class="brand-title">Admin<span style="color: #f59e0b;">Amber</span></h1>
            <small class="text-light opacity-75">Sistem Informasi Kelompok 3</small>
        </div>

        <!-- Body Card -->
        <div class="card-body p-4">
            <p class="text-center text-secondary small fw-semibold mb-4">
                Sign in to start your session
            </p>

            <!-- Form Langsung Masuk ke Dashboard (Tanpa DB) -->
            <form action="{{ url('/dashboard') }}" method="GET">
                
                <!-- Input Username / Email -->
                <div class="mb-3">
                    <label class="form-label small fw-bold text-dark">Username / Email</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Masukkan username" required>
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    </div>
                </div>

                <!-- Input Password -->
                <div class="mb-3">
                    <label class="form-label small fw-bold text-dark">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="Masukkan password" required>
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    </div>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label small text-secondary fw-semibold" for="remember">Remember Me</label>
                    </div>
                    <a href="#" class="small link-register">Lupa Password?</a>
                </div>

                <!-- Tombol Acceder / Login -->
                <button type="submit" class="btn btn-amber-gradient w-100 mb-3">
                    Acceder / Sign In <i class="fa-solid fa-right-to-bracket ms-2"></i>
                </button>
            </form>

            <!-- Link Register Baru -->
            <div class="text-center mt-3 pt-2 border-top">
                <span class="small text-muted">Belum punya akun?</span> 
                <a href="#" class="small link-register ms-1">Register baru</a>
            </div>
        </div>
    </div>

</body>
</html>