<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url(auth()->user()->foto ?? '') }}" class="img-circle img-profil" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            @if (auth()->user()->level == 1)
            <li class="header">MASTER DATA</li>
            <li>
                <a href="{{ route('wilayah.index') }}">
                    <i class="fa fa-globe"></i> <span>Wilayah</span>
                </a>
            </li>
            <li>
                <a href="{{ route('biaya_admin.index') }}">
                    <i class="fa fa-bank"></i> <span>Biaya Admin</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pelanggan.index') }}">
                    <i class="fa fa-user-plus"></i> <span>Pelanggan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('jenis_kendaraan.index') }}">
                    <i class="fa fa-road"></i> <span>Jenis Kendaraan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kendaraan.index') }}">
                    <i class="fa fa-motorcycle"></i> <span>Kendaraan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('tipe_pengurusan.index') }}">
                    <i class="fa fa-file"></i> <span>Jenis Pengurusan</span>
                </a>
            </li>
            <li class="header">TRANSAKSI</li>
            <li>
                <a href="{{ route('estimasi.index') }}">
                    <i class="fa fa-calculator"></i> <span>Estimasi</span>
                </a>
            </li>
            <!-- <li>
                <a href="{{ route('kategori.index') }}">
                    <i class="fa fa-cube"></i> <span>Kategori</span>
                </a>
            </li>
            <li>
                <a href="{{ route('produk.index') }}">
                    <i class="fa fa-cubes"></i> <span>Produk</span>
                </a>
            </li>
            <li>
                <a href="{{ route('member.index') }}">
                    <i class="fa fa-id-card"></i> <span>Member</span>
                </a>
            </li>
            <li>
                <a href="{{ route('supplier.index') }}">
                    <i class="fa fa-truck"></i> <span>Supplier</span>
                </a>
            </li> -->
            <!-- <li>
                <a href="{{ route('pengeluaran.index') }}">
                    <i class="fa fa-money"></i> <span>Pengeluaran</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pembelian.index') }}">
                    <i class="fa fa-download"></i> <span>Pembelian</span>
                </a>
            </li>
            <li>
                <a href="{{ route('penjualan.index') }}">
                    <i class="fa fa-upload"></i> <span>Penjualan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.index') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Aktif</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.baru') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Baru</span>
                </a>
            </li>
            <li class="header">REPORT</li>
            <li>
                <a href="{{ route('laporan.index') }}">
                    <i class="fa fa-file-pdf-o"></i> <span>Laporan</span>
                </a>
            </li> -->
            <li class="header">SYSTEM</li>
            <li>
                <a href="{{ route('user.index') }}">
                    <i class="fa fa-users"></i> <span>User</span>
                </a>
            </li>
            <li>
                <a href="{{ route("setting.index") }}">
                    <i class="fa fa-cogs"></i> <span>Pengaturan</span>
                </a>
            </li>
            @else
            <li class="header">TRANSAKSI</li>
            <li>
                <a href="{{ route('estimasi.index') }}">
                    <i class="fa fa-calculator"></i> <span>Estimasi</span>
                </a>
            </li>
            <!-- <li>
                <a href="{{ route('transaksi.index') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Aktif</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.baru') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Baru</span>
                </a>
            </li> -->
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>