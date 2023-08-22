<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Gor<span>Lib</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            @if(Auth::user()->role === 'user')
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item {{ active_class(['dashboard']) }}">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Koleksi</li>
                <li class="nav-item {{ active_class(['collections']) }}">
                    <a href="{{ url('/collections') }}" class="nav-link">
                        <i class="link-icon" data-feather="search"></i>
                        <span class="link-title">Pencarian</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Sirkulasi</li>
                <li class="nav-item {{ active_class(['daftar-peminjaman']) }}">
                    <a href="{{ url('/daftar-peminjaman') }}" class="nav-link">
                        <i class="link-icon" data-feather="book-open"></i>
                        <span class="link-title">Daftar Peminjaman</span>
                    </a>
                </li>
            @endif

            @if(Auth::user()->role === 'admin')
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item {{ active_class(['dashboard']) }}">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Koleksi</li>
                <li class="nav-item {{ active_class(['collections']) }}">
                    <a href="{{ url('/collections') }}" class="nav-link">
                        <i class="link-icon" data-feather="search"></i>
                        <span class="link-title">Pencarian</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['add_collection']) }}">
                    <a href="{{ url('add_collection') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-plus"></i>
                        <span class="link-title">Tambah Koleksi</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['apps/calendar']) }}">
                    <a href="{{ url('/apps/calendar') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Laporan</span>
                    </a>
                </li>

                <li class="nav-item nav-category">Sirkulasi</li>
                <li class="nav-item {{ active_class(['daftar-peminjaman']) }}">
                    <a href="{{ url('/daftar-peminjaman') }}" class="nav-link">
                        <i class="link-icon" data-feather="book-open"></i>
                        <span class="link-title">Daftar Peminjaman</span>
                    </a>
                </li>
            @endif

            @if(Auth::user()->role === 'pimpinan')
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item {{ active_class(['dashboard']) }}">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Koleksi</li>
                <li class="nav-item {{ active_class(['collections']) }}">
                    <a href="{{ url('/collections') }}" class="nav-link">
                        <i class="link-icon" data-feather="search"></i>
                        <span class="link-title">Pencarian</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['apps/calendar']) }}">
                    <a href="{{ url('/apps/calendar') }}" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Laporan</span>
                    </a>
                </li>

                <li class="nav-item nav-category">Sirkulasi</li>
                <li class="nav-item {{ active_class(['daftar-peminjaman']) }}">
                    <a href="{{ url('/daftar-peminjaman') }}" class="nav-link">
                        <i class="link-icon" data-feather="book-open"></i>
                        <span class="link-title">Daftar Peminjaman</span>
                    </a>
                </li>
            @endif



        </ul>
    </div>
</nav>
