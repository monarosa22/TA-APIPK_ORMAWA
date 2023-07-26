{{-- <ul class="nav">
    <li>
        <a href="{{ url('/ormawa/dashboard') }}" class="active">
            <i class="lnr lnr-home"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="notifications.html" class="">
            <i class="lnr lnr-alarm"></i>
            <span>Izin Kegiatan</span>
        </a>
    </li>
    <li>
        <a href="notifications.html" class="">
            <i class="lnr lnr-alarm"></i>
            <span>Laporan Kegiatan</span>
        </a>
    </li>
</ul> --}}

<nav>
    <ul class="nav">
        <li>
            <a href="{{ url('/ormawa/dashboard') }}" class="active">
                <i class="lnr lnr-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/ormawa/izin_kegiatan') }}" class="">
                <i class="fa fa-edit"></i>
                <span>Izin Kegiatan</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/ormawa/laporan_kegiatan') }}" class="">
                <i class="fa fa-bar-chart"></i>
                <span>Laporan Kegiatan</span>
            </a>
        </li>
        <li>
            <a href="notifications.html" class="">
                <i class="fa fa-user"></i>
                <span>Profil Saya</span>
            </a>
        </li>
        <li>
            <a href="notifications.html" class="">
                <i class="fa fa-key"></i>
                <span>Ganti Password</span>
            </a>
        </li>
    </ul>
</nav>
