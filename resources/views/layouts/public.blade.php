<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sony Prima Jaya - Elektronik & Servis</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --brand: #d94826;
            --brand-dark: #b8381a;
            --brand-soft: #fdf2ef;
            --ink: #1f2430;
            --muted: #7b8190;
            --surface: #ffffff;
            --canvas: #f5f6fa;
            --shadow-soft: 0 2px 8px rgba(31, 36, 48, .05);
            --shadow-hover: 0 14px 30px rgba(31, 36, 48, .10);
        }

        body {
            background: var(--canvas);
            color: var(--ink);
            font-family: 'Segoe UI', system-ui, -apple-system, Roboto, Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1 0 auto;
        }

        a {
            transition: color .2s ease, background-color .2s ease, border-color .2s ease;
        }

        .topbar {
            background: #1f2430;
            padding: 10px 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .15);
        }

        .logo {
            font-size: 22px;
            font-weight: 800;
            color: #ffffff;
            text-decoration: none;
            letter-spacing: -.3px;
            white-space: nowrap;
        }

        .logo:hover {
            color: #ff8a5c;
        }

        .search-box {
            display: flex;
            align-items: center;
            background: #2b3140;
            border: 1px solid transparent;
            border-radius: 50rem;
            padding: 3px 3px 3px 16px;
            transition: border-color .2s ease, box-shadow .2s ease, background-color .2s ease;
        }

        .search-box:focus-within {
            background: #2b3140;
            border-color: var(--brand);
            box-shadow: 0 0 0 .2rem rgba(217, 72, 38, .2);
        }

        .search-box input::placeholder {
            color: #9aa1b2;
        }

        .search-box input {
            border: none;
            outline: none;
            color: #ffffff;
            background: transparent;
            width: 100%;
            min-width: 0;
            padding: 7px 8px;
            font-size: 14px;
        }

        .search-box button {
            background: var(--brand);
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            transition: background-color .2s ease, transform .2s ease;
        }

        .search-box button:hover {
            background: var(--brand-dark);
            transform: scale(1.06);
        }

        .nav-link-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #d1d5db;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            padding: 8px 14px;
            border-radius: 50rem;
            white-space: nowrap;
        }

        .nav-link-pill:hover {
            background: rgba(255, 255, 255, .1);
            color: #ffffff;
        }

        .nav-link-pill.primary {
            background: var(--brand);
            color: #ffffff;
        }

        .nav-link-pill.primary:hover {
            background: var(--brand-dark);
            color: #ffffff;
        }

        .hero {
            background: #ffffff;
            color: var(--ink);
            border: 1px solid #e2e5ec;
            border-left: 6px solid var(--brand);
            box-shadow: var(--shadow-soft);
            border-radius: 1.5rem;
            padding: 44px 48px;
            min-height: 230px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            overflow: hidden;
        }

        .hero h1 {
            font-size: 36px;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        .hero p {
            color: #4a5060;
            opacity: 1;
            max-width: 460px;
        }

        .hero > i,
        .hero .fa-3x,
        .hero .fa-4x,
        .hero .fa-5x {
            color: var(--brand);
            opacity: .85;
        }

        .hero img {
            width: 230px;
            height: 180px;
            object-fit: cover;
            border-radius: 1.25rem;
            flex-shrink: 0;
            box-shadow: 0 12px 30px rgba(0, 0, 0, .2);
        }

        .btn-hero {
            background: var(--brand);
            color: #ffffff;
            font-weight: 700;
            border: none;
            border-radius: 50rem;
            padding: 10px 26px;
        }

        .btn-hero:hover {
            background: var(--brand-dark);
            color: #ffffff;
        }

        .section-title {
            font-weight: 700;
            font-size: 20px;
            margin-bottom: 20px;
            letter-spacing: -.2px;
        }

        .price {
            color: var(--brand);
            font-weight: 800;
            font-size: 17px;
        }

        .footer {
            background: #1f2430;
            color: #aab0bd;
            padding: 36px 0 20px;
            margin-top: 48px;
            flex-shrink: 0;
        }

        .footer h5 {
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .footer p {
            font-size: 14px;
            margin-bottom: 8px;
        }

        .footer a {
            color: #aab0bd;
            text-decoration: none;
        }

        .footer a:hover {
            color: #fff;
        }

        .footer hr {
            border-color: rgba(255, 255, 255, .12);
            opacity: 1;
        }

        @media (max-width: 767.98px) {
            .logo {
                font-size: 18px;
            }

            .hero {
                padding: 28px 24px;
                min-height: 0;
            }

            .hero h1 {
                font-size: 26px;
            }

            .hero img {
                display: none;
            }

            .footer {
                margin-top: 32px;
            }
        }
    </style>
</head>

<body>

    <header class="topbar">
        <div class="container">
            <div class="row align-items-center g-2">
                <div class="col-5 col-md-3">
                    <a href="{{ route('home') }}" class="logo">Sony Prima Jaya</a>
                </div>

                <div class="col-7 col-md-4">
                    <form action="{{ route('home') }}" method="GET" class="search-box">
                        <input type="text" name="search" placeholder="Cari produk elektronik..."
                            value="{{ request('search') }}">
                        <button type="submit" aria-label="Cari">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>

                <div class="col-md-5 d-none d-md-flex justify-content-end align-items-center gap-1">
                    <a href="{{ route('home') }}"
                        class="nav-link-pill {{ request()->routeIs('home') ? 'primary' : '' }}">
                        <i class="fa fa-store"></i> Katalog
                    </a>
                    <a href="{{ route('cek-servis') }}"
                        class="nav-link-pill {{ request()->routeIs('cek-servis') ? 'primary' : '' }}">
                        <i class="fa fa-tools"></i> Cek Servis
                    </a>

                    @guest
                        <a href="{{ route('login') }}"
                            class="nav-link-pill {{ request()->routeIs('login', 'register') ? 'primary' : '' }}">
                            <i class="fa fa-sign-in-alt"></i> Masuk
                        </a>
                    @else
                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="nav-link-pill">
                                <i class="fa fa-tachometer-alt"></i> Dashboard
                            </a>
                        @else
                            <a href="{{ route('riwayat-servis') }}"
                                class="nav-link-pill {{ request()->routeIs('riwayat-servis') ? 'primary' : '' }}">
                                <i class="fa fa-history"></i> Riwayat Servis
                            </a>
                            <span class="nav-link-pill text-white">
                                <i class="fa fa-user-circle"></i> {{ Auth::user()->nama }}
                            </span>
                        @endif

                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link-pill border-0 bg-transparent text-white">
                                <i class="fa fa-sign-out-alt"></i> Keluar
                            </button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </header>

    <main class="container pt-4 pb-0">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4" role="alert">
                <i class="fa fa-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show rounded-4" role="alert">
                <i class="fa fa-exclamation-circle me-1"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5>Sony Prima Jaya.</h5>
                    <p>Pusat penjualan alat elektronik dan layanan servis terpercaya. Berlokasi di Jl. Kayangan,
                        Pekanbaru.</p>
                </div>

                <div class="col-6 col-md-4">
                    <h5>Layanan Kami</h5>
                    <p><a href="{{ route('cek-servis') }}">Cek Status Servis</a></p>
                    <p><a href="{{ route('home') }}#produk">Katalog Penjualan</a></p>
                    <p>Informasi Garansi</p>
                </div>

                <div class="col-6 col-md-4">
                    <h5>Hubungi Kami</h5>
                    <p><i class="fab fa-whatsapp me-1"></i> +62 812-xxxx-xxxx</p>
                    <p><i class="fa fa-map-marker-alt me-1"></i> Jl. Kayangan, Pekanbaru</p>
                </div>
            </div>
            <hr class="my-4">
            <p class="text-center small mb-0">
                © 2026 Toko Elektronik Sony Prima Jaya. All Rights Reserved.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
