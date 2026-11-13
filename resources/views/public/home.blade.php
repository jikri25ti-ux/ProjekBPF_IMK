@extends('layouts.public')

@section('content')
    <style>
        .category-card {
            display: block;
            background: #fff;
            border-radius: 1rem;
            padding: 20px 10px;
            text-align: center;
            height: 100%;
            color: var(--ink);
            box-shadow: var(--shadow-soft);
            transition: transform .25s ease, box-shadow .25s ease;
        }
        .category-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-hover); }
        .category-card .icon-wrap {
            width: 48px;
            height: 48px;
            margin: 0 auto 12px;
            border-radius: 50%;
            background: var(--brand-soft);
            color: var(--brand);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: background-color .25s ease, color .25s ease;
        }
        .category-card:hover .icon-wrap { background: var(--brand); color: #fff; }
        .category-card p { font-size: 13px; font-weight: 600; margin: 0; }

        .product-card {
            background: #fff;
            border-radius: 1rem;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: var(--shadow-soft);
            transition: transform .25s ease, box-shadow .25s ease;
        }
        .product-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-hover); }
        .product-card .thumb { aspect-ratio: 4 / 3; overflow: hidden; background: #eceef3; }
        .product-card .thumb img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .4s ease; }
        .product-card:hover .thumb img { transform: scale(1.05); }
        .product-info { padding: 14px; display: flex; flex-direction: column; flex: 1; }
        .product-name {
            font-size: 14px;
            font-weight: 600;
            line-height: 1.4;
            min-height: 2.8em;
            margin-bottom: 6px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .product-meta { font-size: 12px; color: var(--muted); margin-top: 8px; }
        .btn-wa {
            margin-top: auto;
            background: #e8f8ee;
            color: #16a34a;
            border: none;
            border-radius: 50rem;
            font-size: 13px;
            font-weight: 700;
            padding: 8px 12px;
            transition: background-color .2s ease, color .2s ease;
        }
        .btn-wa:hover { background: #16a34a; color: #fff; }
        .product-actions { margin-top: 14px; display: flex; }

        @media (max-width: 767.98px) {
            .product-info { padding: 12px; }
            .btn-wa { font-size: 12px; }
        }
    </style>

    <section class="hero mb-4">
        <div>
            <span class="badge rounded-pill bg-light text-danger mb-3">LAYANAN TERBAIK</span>
            <h1>Solusi Servis &<br>Kebutuhan Elektronik</h1>
            <p class="mb-4">Percayakan perbaikan TV dan elektronik Anda pada teknisi ahli kami.</p>
            <a href="#produk" class="btn btn-hero">Lihat Katalog</a>
        </div>
        <img src="https://www.oscarliving.co.id/cdn/shop/files/kipas-angin-kipas-angin-cosmos-industrial-desk-fan-9pda-cosmos-shopname-4939856.jpg?v=1763018459" alt="Elektronik">
    </section>

    <section class="mb-5">
        <h5 class="section-title">Kategori Produk</h5>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-5 g-3">
            @php
                $categories = [
                    ['Televisi', 'fa-tv'],
                    ['Mesin Cuci', 'fa-soap'],
                    ['Kipas Angin', 'fa-fan'],
                    ['Speaker', 'fa-volume-up'],
                    ['Kabel & Adaptor', 'fa-plug']
                ];
            @endphp

            @foreach($categories as $category)
                <div class="col">
                    <div class="category-card">
                        <div class="icon-wrap"><i class="fa {{ $category[1] }}"></i></div>
                        <p>{{ $category[0] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="produk">
        <h5 class="section-title">Katalog Produk Tersedia</h5>

        @php
            $products = [
                ['TV LED 32 Inch Bekas Normal','1250000','4.9','Tersedia','Toko','https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=400'],
                ['Mesin Cuci 2 Tabung (Second)','850000','4.8','Tersedia','Toko','https://images.unsplash.com/photo-1626806787461-102c1bfaaea1?w=400'],
                ['Remote TV Universal Multi','35000','4.7','Tersedia','Toko','https://images.unsplash.com/photo-1584905066893-7d5c142ba4e1?w=400'],
                ['Kipas Angin Dinding','150000','4.9','Tersedia','Toko','https://images.unsplash.com/photo-1616788874134-2e92c48bd5de?w=400']
            ];

            if(request('search')) {
                $products = array_filter($products, function($p) {
                    return stripos($p[0], request('search')) !== false;
                });
            }
        @endphp

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
            @forelse($products as $product)
                <div class="col">
                    <div class="product-card">
                        <div class="thumb">
                            <img src="{{ $product[5] }}" alt="{{ $product[0] }}" loading="lazy">
                        </div>
                        <div class="product-info">
                            <div class="product-name">{{ $product[0] }}</div>
                            <div class="price">Rp{{ number_format($product[1],0,',','.') }}</div>
                            <div class="product-meta">
                                <div class="text-success"><i class="fa fa-check-circle"></i> Stok: {{ $product[3] }}</div>
                                <div><i class="fa fa-store"></i> {{ $product[4] }}</div>
                            </div>

                            <div class="product-actions">
                                <a href="https://wa.me/6281234567890?text=Halo%20Toko%20Sony%20Prima%20Jaya,%20apakah%20produk%20*{{ urlencode($product[0]) }}*%20ini%20masih%20ada?"
                                   target="_blank"
                                   rel="noopener"
                                   class="btn btn-wa w-100">
                                    <i class="fab fa-whatsapp"></i> Tanya via WA
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted">Produk tidak ditemukan.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
