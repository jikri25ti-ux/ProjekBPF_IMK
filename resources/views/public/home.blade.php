@extends('layouts.public')

@section('content')
    <style>
        .category-card {
            display: block;
            text-decoration: none;
            background: #fff;
            border-radius: 1rem;
            padding: 20px 10px;
            text-align: center;
            height: 100%;
            color: var(--ink);
            border: 2px solid transparent;
            box-shadow: var(--shadow-soft);
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }
        .category-card:hover, .category-card.active {
            transform: translateY(-4px);
            box-shadow: var(--shadow-hover);
            border-color: var(--brand);
        }
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
        .category-card:hover .icon-wrap, .category-card.active .icon-wrap {
            background: var(--brand);
            color: #fff;
        }
        .category-card p { font-size: 13px; font-weight: 600; margin: 0; }

        .product-card {
            background: #fff;
            border-radius: .85rem;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: var(--shadow-soft);
            transition: transform .25s ease, box-shadow .25s ease;
        }
        .product-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-hover); }
        .product-card .thumb { aspect-ratio: 16 / 10; overflow: hidden; background: #eceef3; display: flex; align-items: center; justify-content: center; }
        .product-card .thumb img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .4s ease; }
        .product-card:hover .thumb img { transform: scale(1.05); }
        .product-info { padding: 12px; display: flex; flex-direction: column; flex: 1; }
        .product-name {
            font-size: 13.5px;
            font-weight: 600;
            line-height: 1.35;
            margin-bottom: 4px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .product-card .price { font-size: 15px; }
        .product-meta { font-size: 11.5px; color: var(--muted); margin-top: 6px; line-height: 1.4; }
        .btn-wa {
            margin-top: auto;
            background: #e8f8ee;
            color: #16a34a;
            border: none;
            border-radius: 50rem;
            font-size: 12px;
            font-weight: 700;
            padding: 6px 10px;
            transition: background-color .2s ease, color .2s ease;
        }
        .btn-wa:hover { background: #16a34a; color: #fff; }
        .product-actions { margin-top: 10px; display: flex; }

        .hero img {
            background: var(--canvas, #f5f6fa) !important;
            border: 1px solid #e2e5ec !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .04) !important;
            mix-blend-mode: multiply;
        }

        @media (max-width: 767.98px) {
            .product-info { padding: 10px; }
            .btn-wa { font-size: 11.5px; }
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
        <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-6 g-3">
            <div class="col">
                <a href="{{ url('/#produk') }}" class="category-card {{ !request('kategori') ? 'active' : '' }}">
                    <div class="icon-wrap"><i class="fa fa-th-large"></i></div>
                    <p>Semua Produk</p>
                </a>
            </div>

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
                    <a href="{{ url('/?kategori=' . urlencode($category[0]) . '#produk') }}"
                       class="category-card {{ request('kategori') == $category[0] ? 'active' : '' }}">
                        <div class="icon-wrap"><i class="fa {{ $category[1] }}"></i></div>
                        <p>{{ $category[0] }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <section id="produk">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="section-title mb-0">
                Katalog Produk Tersedia
                @if(request('kategori'))
                    <span class="text-muted fs-6 fw-normal">({{ request('kategori') }})</span>
                @endif
            </h5>
            @if(request('search') || request('kategori'))
                <a href="{{ url('/#produk') }}" class="btn btn-sm btn-outline-secondary rounded-pill">Reset Filter</a>
            @endif
        </div>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
            @forelse($produks as $product)
                <div class="col">
                    <div class="product-card">
                        <div class="thumb">
                            @if($product->gambar)
                                <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}" loading="lazy">
                            @else
                                <div class="text-muted text-center p-3">
                                    <i class="fa fa-image fa-2x mb-1 d-block"></i>
                                    <small>Tanpa Foto</small>
                                </div>
                            @endif
                        </div>
                        <div class="product-info">
                            <div class="product-name">{{ $product->nama_produk }}</div>
                            <div class="price">Rp{{ number_format($product->harga, 0, ',', '.') }}</div>
                            <div class="product-meta">
                                @if($product->stok > 0)
                                    <div class="text-success"><i class="fa fa-check-circle"></i> Stok: {{ $product->stok }} unit</div>
                                @else
                                    <div class="text-danger"><i class="fa fa-times-circle"></i> Stok Habis</div>
                                @endif
                                <div><i class="fa fa-tag"></i> {{ $product->kategori }}</div>
                            </div>

                            <div class="product-actions">
                                <a href="https://wa.me/6281234567890?text=Halo%20Toko%20Sony%20Prima%20Jaya,%20apakah%20produk%20*{{ urlencode($product->nama_produk) }}*%20seharga%20Rp{{ number_format($product->harga, 0, ',', '.') }}%20masih%20ada?"
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
                    <div class="bg-white rounded-4 p-4 text-center shadow-sm">
                        <p class="text-muted mb-0">Produk tidak ditemukan.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </section>
@endsection
