@extends('layouts.public')

@section('content')
    <!-- HERO BANNER -->
    <section class="hero mb-4">
        <div>
            <span class="badge bg-light text-danger mb-3">LAYANAN TERBAIK</span>
            <h1>Solusi Servis &<br>Kebutuhan Elektronik!</h1>
            <p>Percayakan perbaikan TV dan elektronik Anda pada teknisi ahli kami.</p>
            <a href="#produk" class="btn btn-light text-danger fw-bold px-4">
                Lihat Katalog
            </a>
        </div>
        <img src="https://images.unsplash.com/photo-1607082349566-187342175e2f?w=500" alt="Shopping">
    </section>

    <!-- CATEGORIES -->
    <section class="mb-5">
        <h5 class="section-title">Kategori Layanan & Produk</h5>
        <div class="row row-cols-3 row-cols-md-6 g-3">
            @php
                // Diubah agar relevan dengan Sony Prima Jaya
                $categories = [
                    ['Televisi', 'fa-tv'],
                    ['Sparepart', 'fa-microchip'],
                    ['Kipas Angin', 'fa-fan'],
                    ['Speaker', 'fa-volume-up'],
                    ['Kabel & Adaptor', 'fa-plug'],
                    ['Servis Panggilan', 'fa-tools']
                ];
            @endphp

            @foreach($categories as $category)
                <div class="col">
                    <div class="category-card">
                        <i class="fa {{ $category[1] }}"></i>
                        <p>{{ $category[0] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- FLASH SALE (Opsional - Jika mau dipertahankan) -->
    <section class="sale-section mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="sale-heading mb-0">
                <i class="fa fa-bolt"></i> SPESIAL HARI INI
            </h5>
            <span class="text-secondary small">
                Berakhir dalam <strong id="timer">02:00:00</strong>
            </span>
        </div>
        <div class="row row-cols-2 row-cols-md-4 g-3">
            @foreach([
                ['Bracket TV Universal','95000','150000','36','https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=400'],
                ['Kabel HDMI 5 Meter','45000','75000','40','https://images.unsplash.com/photo-1538356111053-748a48e1acb8?w=400'],
            ] as $product)
                <div class="col">
                    <div class="product-card">
                        <img src="{{ $product[4] }}" alt="{{ $product[0] }}">
                        <div class="product-info">
                            <div class="product-name">{{ $product[0] }}</div>
                            <div class="price">Rp{{ number_format($product[1],0,',','.') }}</div>
                            <span class="old-price">Rp{{ number_format($product[2],0,',','.') }}</span>
                            <span class="badge-sale">{{ $product[3] }}% OFF</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ALL PRODUCTS -->
    <section id="produk" class="mb-5">
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

        <div class="row row-cols-2 row-cols-md-4 g-3">
            @forelse($products as $product)
                <div class="col">
                    <div class="product-card">
                        <img src="{{ $product[5] }}" alt="{{ $product[0] }}">
                        <div class="product-info">
                            <div class="product-name">{{ $product[0] }}</div>
                            <div class="price">Rp{{ number_format($product[1],0,',','.') }}</div>
                            <div class="product-meta">
                                <span class="text-success"><i class="fa fa-check-circle"></i> Stok: {{ $product[3] }}</span>
                                <br>
                                <i class="fa fa-store"></i> {{ $product[4] }}
                            </div>

                            <!-- Tombol Diubah Menuju WhatsApp -->
                            <a href="https://wa.me/6281234567890?text=Halo%20Toko%20Sony%20Prima%20Jaya,%20apakah%20produk%20*{{ urlencode($product[0]) }}*%20ini%20masih%20ada?"
                               target="_blank"
                               class="btn btn-sm btn-outline-success w-100 mt-3">
                                <i class="fab fa-whatsapp"></i> Tanya via WA
                            </a>
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
