<!DOCTYPE html>
<html
  lang="id"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('admin_assets/') }}/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Admin Dashboard - Toko Elektronik Sony Prima Jaya</title>

    <meta name="description" content="Sistem Manajemen Servis dan E-Commerce Sony Prima Jaya" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admin_assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin_assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('admin_assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('admin_assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <!-- Menu Sidebar -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{ url('/admin') }}" class="app-brand-link">
              <span class="app-brand-logo demo">
                <i class="bx bx-wrench text-primary fs-2"></i>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: capitalize;">Sony Prima</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ Request::is('admin') ? 'active' : '' }}">
              <a href="{{ url('/admin') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Manajemen Data (CRUD)</span>
            </li>

            <!-- CRUD Pelanggan -->
            <li class="menu-item {{ Request::is('admin/pelanggan*') ? 'active' : '' }}">
              <a href="{{ url('/admin/pelanggan') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div>Data Pelanggan</div>
              </a>
            </li>

            <!-- CRUD Servis -->
            <li class="menu-item {{ Request::is('admin/servis*') ? 'active' : '' }}">
              <a href="{{ url('/admin/servis') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-wrench"></i>
                <div>Data Servis</div>
              </a>
            </li>

            <!-- CRUD Produk / Sparepart -->
            <li class="menu-item {{ Request::is('admin/produk*') ? 'active' : '' }}">
              <a href="{{ url('/admin/produk') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div>Data Produk</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pintasan</span>
            </li>

            <!-- Lihat Web Publik -->
            <li class="menu-item">
              <a href="{{ url('/') }}" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-globe"></i>
                <div>Lihat Web Publik</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu Sidebar -->

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Navbar -->
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Nama Toko di Topbar -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <span class="fw-semibold text-muted">Panel Administrasi Toko Elektronik Sony Prima Jaya</span>
                </div>
              </div>

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User Dropdown -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{ asset('admin_assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{ asset('admin_assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">Admin / Teknisi</span>
                            <small class="text-muted">Sony Prima Jaya</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ url('/') }}">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Keluar (Ke Beranda)</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User Dropdown -->
              </ul>
            </div>
          </nav>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">

            <!-- AREA KONTEN DINAMIS -->
            <div class="container-xxl flex-grow-1 container-p-y">
              @yield('content')
            </div>
            <!-- / AREA KONTEN DINAMIS -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  © <script>document.write(new Date().getFullYear());</script>
                  <strong>Toko Elektronik Sony Prima Jaya</strong> - Jl. Kayangan, Pekanbaru.
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- / Content wrapper -->

        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <script src="{{ asset('admin_assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/js/menu.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('admin_assets/js/main.js') }}"></script>
  </body>
</html>
