<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sony Prima Jaya - Elektronik & Servis</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }
        body { background: #f5f6fa; font-family: Arial, sans-serif; color: #292d32; }
        .topbar { background: #fff; padding: 18px 0; position: sticky; top: 0; z-index: 100; box-shadow: 0 2px 10px #00000008; }
        .logo { font-size: 27px; font-weight: 800; color: #ee4d2d; text-decoration: none; }
        .search-box { display: flex; background: #f3f4f6; border-radius: 10px; padding: 5px 12px; border: 1px solid #eee; }
        .search-box input { border: none; outline: none; background: transparent; width: 100%; padding: 9px; }
        .search-box button { background: #ee4d2d; color: white; border: none; border-radius: 7px; padding: 8px 18px; }
        .nav-icons a { color: #444; text-decoration: none; margin-left: 20px; font-size: 15px; }
        .footer { background: #252a34; color: #bbb; padding: 40px 0; margin-top: 60px; }
        .footer h5 { color: white; }

        /* Tambahan styling konten yang diekstrak dari index lama */
        .hero { background: linear-gradient(110deg, #ee4d2d, #ff956d); border-radius: 16px; padding: 45px; color: white; min-height: 240px; display: flex; align-items: center; justify-content: space-between; overflow: hidden; }
        .hero h1 { font-size: 38px; font-weight: 800; }
        .hero img { width: 230px; height: 190px; object-fit: contain; }
        .section-title { font-weight: 750; font-size: 21px; margin-bottom: 20px; }
        .category-card { background: white; border-radius: 12px; padding: 20px 10px; text-align: center; height: 100%; transition: .2s; }
        .category-card:hover { transform: translateY(-4px); box-shadow: 0 5px 15px #00000010; }
        .category-card i { font-size: 28px; color: #ee4d2d; margin-bottom: 12px; }
        .category-card p { font-size: 13px; margin: 0; }
        .product-card { background: white; border-radius: 12px; overflow: hidden; height: 100%; transition: .2s; border: 1px solid #eee; }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 8px 20px #00000012; }
        .product-card img { width: 100%; height: 190px; object-fit: cover; }
        .product-info { padding: 13px; }
        .product-name { font-size: 14px; height: 40px; overflow: hidden; }
        .price { color: #ee4d2d; font-weight: 800; font-size: 17px; }
        .old-price { color: #aaa; font-size: 11px; text-decoration: line-through; }
        .product-meta { font-size: 11px; color: #888; margin-top: 10px; }
        .sale-section { background: white; border-radius: 14px; padding: 22px; }
        .sale-heading { color: #ee4d2d; font-weight: 800; }
        .badge-sale { background: #ee4d2d; color: white; padding: 4px 8px; font-size: 11px; border-radius: 4px; }

        @media(max-width: 768px) {
            .hero { padding: 25px; min-height: 190px; }
            .hero h1 { font-size: 25px; }
            .hero img { width: 110px; height: 120px; }
            .nav-icons { display: none; }
            .product-card img { height: 140px; }
        }
    </style>
</head>

<body>

<!-- HEADER -->
<header class="topbar">
    <div class="container">
        <div class="row align-items-center g-3">
            <div class="col-4 col-md-3">
                <!-- Ubah nama toko -->
                <a href="/" class="logo">Sony Prima Jaya.</a>
            </div>

            <div class="col-8 col-md-5">
                <form action="/" method="GET" class="search-box">
                    <input type="text" name="search"
                        placeholder="Cari sparepart atau elektronik..."
                        value="{{ request('search') }}">
                    <button type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>

            <div class="col-md-4 nav-icons text-end">
                <!-- Tambah menu servis, hapus wishlist & keranjang -->
                <a href="#" class="text-danger fw-bold"><i class="fa fa-tools"></i> Cek Status Servis</a>
                <a href="#"><i class="fa fa-sign-in-alt"></i> Login Admin</a>
            </div>
        </div>
    </div>
</header>

<!-- AREA KONTEN DINAMIS -->
<main class="container py-4">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <!-- Ubah alamat dan deskripsi -->
                <h5>Sony Prima Jaya.</h5>
                <p>Pusat penjualan alat elektronik dan layanan servis terpercaya. Berlokasi di Jl. Kayangan, Pekanbaru.</p>
            </div>

            <div class="col-md-4">
                <h5>Layanan Kami</h5>
                <p>Cek Status Servis</p>
                <p>Katalog Penjualan</p>
                <p>Informasi Garansi</p>
            </div>

            <div class="col-md-4">
                <h5>Hubungi Kami</h5>
                <p><i class="fab fa-whatsapp"></i> +62 812-xxxx-xxxx</p>
                <p><i class="fa fa-map-marker-alt"></i> Jl. Kayangan, Pekanbaru</p>
            </div>
        </div>
        <hr>
        <p class="text-center mb-0">
            © 2026 Toko Elektronik Sony Prima Jaya. All Rights Reserved.
        </p>
    </div>
</footer>

<script>
    // Flash sale countdown script dari index lama
    let seconds = 7200;
    setInterval(() => {
        seconds = seconds > 0 ? seconds - 1 : 7200;
        let h = Math.floor(seconds / 3600);
        let m = Math.floor((seconds % 3600) / 60);
        let s = seconds % 60;
        let timerElement = document.getElementById('timer');
        if (timerElement) {
            timerElement.innerText = [h,m,s].map(n => String(n).padStart(2,'0')).join(':');
        }
    }, 1000);
</script>

</body>
</html>
