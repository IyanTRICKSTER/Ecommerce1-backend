<nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="{{ request()->is('/') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}"><i class
                    ="menu-icon fa fa-tachometer"></i>Dashboard </a>
                    
            </li>
            <li class="menu-title">Barang</li><!-- /.menu-title -->
            <li class="{{ request()->is('product') ? 'active' : '' }}">
                <a href="{{ route('product.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Barang</a>
            </li>
            <li class="{{ request()->is('product/create') ? 'active' : '' }}">
                <a href="{{ route('product.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Barang</a>
            </li>

            <li class="menu-title">Foto Barang</li><!-- /.menu-title -->
            <li class="{{ request()->is('product-galleries') ? 'active' : '' }}">
                <a href="{{ route('product-galleries.index') }}"> <i class="menu-icon fa fa-image"></i>Lihat Foto Barang</a>
            </li>
            <li class="{{ request()->is('product-galleries/create') ? 'active' : '' }}">
                <a href="{{ route('product-galleries.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Foto Barang</a>
            </li>

            <li class="menu-title">Transaksi</li><!-- /.menu-title -->
            <li class="{{ request()->is('transaction') ? 'active' : '' }}">
                <a href="{{ route('transaction.index') }}"> <i class="menu-icon fas fa-money-check"></i>Lihat Transaksi</a>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>

<style>
    
</style>