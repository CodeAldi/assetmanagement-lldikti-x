<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            {{-- <span class="app-brand-logo demo">

            </span> --}}
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Manajemen Aset<br>LLDIKTI X</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ (Request::RouteIs('home')) ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Home</div>
            </a>
        </li>
        @if (Auth()->user()->hasRole('pegawai tu'))
        {{--!  user pegawai TU !--}}
        <li class="menu-item {{ (Request::RouteIs('aset.*')) ? 'active' : '' }}">
            <a href="{{ route('aset.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-library"></i>
                <div>Data Aset</div>
            </a>
        </li>
        <li class="menu-item {{ (Request::RouteIs('manajemen*')) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-transfer"></i>
                <div>Peminjaman & pengembalian Aset</div>
            </a>
        
            <ul class="menu-sub">
                <li class="menu-item {{ (Request::RouteIs('manajemenPeminjamanAset.*')) ? 'active' : '' }}">
                    <a href="{{ route('manajemenPeminjamanAset.index') }}" class="menu-link">
                        <div>Peminjaman</div>
                    </a>
                </li>
                <li class="menu-item {{ (Request::RouteIs('manajemenPengembalian.*')) ? 'active' : '' }}">
                    <a href="{{ route('manajemenPengembalian.index') }}" class="menu-link">
                        <div>Pengembalian</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ (Request::RouteIs('prediksi*')) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-analyse"></i>
                <div>Prediksi Kondisi Aset</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ (Request::RouteIs('prediksi.kriteria.*')) ? 'active' : '' }}">
                    <a href="{{ route('prediksi.kriteria.index') }}" class="menu-link">
                        <div>Kriteria</div>
                    </a>
                </li>
                <li class="menu-item {{ (Request::RouteIs('prediksi.alternatif.*')) ? 'active' : '' }}">
                    <a href="{{ route('prediksi.alternatif.index') }}" class="menu-link">
                        <div>alternatif</div>
                    </a>
                </li>
                <li class="menu-item {{ (Request::RouteIs('prediksi.nilaiKriteria.*')) ? 'active' : '' }}">
                    <a href="{{ route('prediksi.nilaiKriteria.index') }}" class="menu-link">
                        <div>nilai kriteria</div>
                    </a>
                </li>
                <li class="menu-item {{ (Request::RouteIs('prediksi.normalisasi.*')) ? 'active' : '' }}">
                    <a href="{{ route('prediksi.normalisasi.index') }}" class="menu-link">
                        <div>normalisasi</div>
                    </a>
                </li>
                <li class="menu-item {{ (Request::RouteIs('prediksi.hasilAkhir.*')) ? 'active' : '' }}">
                    <a href="{{ route('prediksi.hasilAkhir.index') }}" class="menu-link">
                        <div>Hasil Prediksi Kondisi Aset</div>
                    </a>
                </li>
            </ul>
        </li>
        {{-- <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-envelope"></i>
                <div>Surat Sanksi</div>
            </a>
        </li> --}}
        @elseif (Auth()->user()->hasRole('peminjam'))
        {{--! user peminjam !--}}
        <li class="menu-item {{ (Request::RouteIs('ajukan.peminjaman*')) ? 'active' : '' }}">
            <a href="{{ route('ajukan.peminjaman') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-up-arrow-circle"></i>
                <div>Ajukan Peminjaman Aset</div>
            </a>
        </li>
        <li class="menu-item {{ (Request::RouteIs('ajukan.pengembalian*')) ? 'active' : '' }}">
            <a href="{{ route('ajukan.pengembalian') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-down-arrow-circle"></i>
                <div>Ajukan Pengembalian Aset</div>
            </a>
        </li>
        @elseif (Auth()->user()->hasRole('kepala bagian'))
        {{--! user kepala bagian !--}}
        <li class="menu-item {{ (Request::RouteIs('kabag.persetujuan.*')) ? 'active' : '' }}" >
            <a href="{{ route('kabag.persetujuan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-check-circle"></i>
                <div>Konfirmasi Peminjaman Aset</div>
            </a>
        </li>
        <li class="menu-item {{ (Request::RouteIs('kabag.aset.*')) ? 'active' : '' }}" >
            <a href="{{ route('kabag.aset.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-library"></i>
                <div>Data Aset</div>
            </a>
        </li>
        @endif

        <!-- Layouts -->
        {{-- <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Layouts</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="layouts-without-menu.html" class="menu-link">
                        <div data-i18n="Without menu">Without menu</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-without-navbar.html" class="menu-link">
                        <div data-i18n="Without navbar">Without navbar</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-container.html" class="menu-link">
                        <div data-i18n="Container">Container</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="layouts-fluid.html" class="menu-link">
                        <div data-i18n="Fluid">Fluid</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-blank.html" class="menu-link">
                        <div data-i18n="Blank">Blank</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li> --}}
        
    </ul>
</aside>