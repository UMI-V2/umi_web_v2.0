@role('Dinas UKM')
<li class="nav-item">
    <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chart-line"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-building"></i>
        <p>
            Data UMKM
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pemilik Usaha</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('businesses.index') }}"
                class="nav-link {{ Request::is('businesses*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Usaha</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('products.index') }}"
                class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Produk</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-bullhorn"></i>
        <p>
            Pemberitahuan
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('events.index') }}"
                class="nav-link {{ Request::is('events*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Event</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('news.index') }}" class="nav-link {{ Request::is('news*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Berita</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('announcements.index') }}"
                class="nav-link {{ Request::is('announcements*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengumuman</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('eventRegisters.index') }}"
                class="nav-link {{ Request::is('eventRegisters*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Event</p>
            </a>
        </li>
    </ul>
</li>
@endrole
@role('Super Admin')
<li class="nav-item">
    <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chart-line"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-bolt"></i>
        <p>
            Penarikan Dana
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('masterBanks.index') }}"
               class="nav-link {{ Request::is('masterBanks*') ? 'active' : '' }}">
               <i class="far fa-circle nav-icon"></i> 
               <p>Master Banks</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('withdrawBalances.index') }}"
               class="nav-link {{ Request::is('withdrawBalances*') ? 'active' : '' }}">
               <i class="far fa-circle nav-icon"></i> 
               <p>Withdraw Balances</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Pengguna
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('masterPrivileges.index') }}"
                class="nav-link {{ Request::is('masterPrivileges*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Hak Akses Pengguna</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('masterStatusUsers.index') }}"
                class="nav-link {{ Request::is('masterStatusUsers*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Status Pengguna</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengguna</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('addresses.index') }}"
                class="nav-link {{ Request::is('addresses*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Alamat</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-suitcase"></i>
        <p>
            Usaha
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('masterStatusBusinesses.index') }}"
                class="nav-link {{ Request::is('masterStatusBusinesses*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Master Status Usaha</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('businesses.index') }}"
                class="nav-link {{ Request::is('businesses*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Usaha</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('masterBusinessCategories.index') }}"
                class="nav-link {{ Request::is('masterBusinessCategories*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Master Kategori Usaha</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('businessCategories.index') }}"
                class="nav-link {{ Request::is('businessCategories*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori Usaha</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('openHours.index') }}"
                class="nav-link {{ Request::is('openHours*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Jam Buka</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('businessFiles.index') }}"
                class="nav-link {{ Request::is('businessFiles*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>File Usaha</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('discounts.index') }}"
                class="nav-link {{ Request::is('discounts*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Diskon Usaha</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-shopping-cart"></i>
        <p>
            Produk
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('masterUnits.index') }}"
                class="nav-link {{ Request::is('masterUnits*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Master Satuan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('products.index') }}"
                class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Produk</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('masterProductCategories.index') }}"
                class="nav-link {{ Request::is('masterProductCategories*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Master Kategori</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('productCategories.index') }}"
                class="nav-link {{ Request::is('productCategories*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori Produk</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('productDiscounts.index') }}"
                class="nav-link {{ Request::is('productDiscounts*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Diskon Produk</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('ratings.index') }}"
                class="nav-link {{ Request::is('ratings*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Rating</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('productFiles.index') }}"
                class="nav-link {{ Request::is('productFiles*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>File Produk</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-bullhorn"></i>
        <p>
            Pemberitahuan
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('events.index') }}"
                class="nav-link {{ Request::is('events*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Event</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('news.index') }}" class="nav-link {{ Request::is('news*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Berita</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('announcements.index') }}"
                class="nav-link {{ Request::is('announcements*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengumuman</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('eventRegisters.index') }}"
                class="nav-link {{ Request::is('eventRegisters*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Event</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-map"></i>
        <p>
            Lokasi
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('masterProvinces.index') }}"
                class="nav-link {{ Request::is('masterProvinces*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Provinsi</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('master_cities.index') }}"
                class="nav-link {{ Request::is('master_cities*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kota</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('subDistricts.index') }}"
                class="nav-link {{ Request::is('subDistricts*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kecamatan</p>
            </a>
        </li>
    </ul>
</li>
{{-- <li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-truck"></i>
        <p>
            Pengiriman
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('masterDeliveryServices.index') }}"
                class="nav-link {{ Request::is('masterDeliveryServices*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Master Jasa Pengiriman</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('businessDeliveryServices.index') }}"
                class="nav-link {{ Request::is('businessDeliveryServices*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Jasa Pengiriman Usaha</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('shippingCostVariables.index') }}"
                class="nav-link {{ Request::is('shippingCostVariables*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Variabel Biaya Pengiriman</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('shippingUseds.index') }}"
                class="nav-link {{ Request::is('shippingUseds*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengiriman yang digunakan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('salesDeliveryServices.index') }}"
                class="nav-link {{ Request::is('salesDeliveryServices*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Layanan Penjualan Pengiriman</p>
            </a>
        </li>
    </ul>
</li> --}}
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-credit-card"></i>
        <p>
            Pembayaran
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('masterPaymentMethods.index') }}"
                class="nav-link {{ Request::is('masterPaymentMethods*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Master Metode Pembayaran</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('businessPaymentMethods.index') }}"
                class="nav-link {{ Request::is('businessPaymentMethods*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Metode Pembayaran Usaha</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('balances.index') }}"
                class="nav-link {{ Request::is('balances*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Saldo</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-handshake"></i>
        <p>
            Transaksi
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('masterTransactionCategories.index') }}"
                class="nav-link {{ Request::is('masterTransactionCategories*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Master Kategori Transaksi</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('salesTransactions.index') }}"
                class="nav-link {{ Request::is('salesTransactions*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Transaksi Penjualan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('transactionStatuses.index') }}"
                class="nav-link {{ Request::is('transactionStatuses*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Status Transaksi</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('transactionProducts.index') }}"
                class="nav-link {{ Request::is('transactionProducts*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Transaksi Produk</p>
            </a>
        </li>
    </ul>
</li>
@endrole
@role('Admin')
<li class="nav-item">
    <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chart-line"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-bolt"></i>
        <p>
            Penarikan Dana
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('masterBanks.index') }}"
               class="nav-link {{ Request::is('masterBanks*') ? 'active' : '' }}">
               <i class="far fa-circle nav-icon"></i> 
               <p>Master Banks</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('withdrawBalances.index') }}"
               class="nav-link {{ Request::is('withdrawBalances*') ? 'active' : '' }}">
               <i class="far fa-circle nav-icon"></i> 
               <p>Withdraw Balances</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Pengguna
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengguna</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('addresses.index') }}"
                class="nav-link {{ Request::is('addresses*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Alamat</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-suitcase"></i>
        <p>
            Usaha
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('businesses.index') }}"
                class="nav-link {{ Request::is('businesses*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Usaha</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('businessCategories.index') }}"
                class="nav-link {{ Request::is('businessCategories*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori Usaha</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('openHours.index') }}"
                class="nav-link {{ Request::is('openHours*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Jam Buka</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('businessFiles.index') }}"
                class="nav-link {{ Request::is('businessFiles*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>File Usaha</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-shopping-cart"></i>
        <p>
            Produk
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('products.index') }}"
                class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Produk</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('productCategories.index') }}"
                class="nav-link {{ Request::is('productCategories*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori Produk</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('discounts.index') }}"
                class="nav-link {{ Request::is('discounts*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Diskon</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('productDiscounts.index') }}"
                class="nav-link {{ Request::is('productDiscounts*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Diskon Produk</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('ratings.index') }}"
                class="nav-link {{ Request::is('ratings*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Rating</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('productFiles.index') }}"
                class="nav-link {{ Request::is('productFiles*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>File Produk</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-bullhorn"></i>
        <p>
            Pemberitahuan
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('events.index') }}"
                class="nav-link {{ Request::is('events*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Event</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('news.index') }}" class="nav-link {{ Request::is('news*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Berita</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('announcements.index') }}"
                class="nav-link {{ Request::is('announcements*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengumuman</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('eventRegisters.index') }}"
                class="nav-link {{ Request::is('eventRegisters*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Event</p>
            </a>
        </li>
    </ul>
</li>
{{-- <li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-truck"></i>
        <p>
            Pengiriman
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('businessDeliveryServices.index') }}"
                class="nav-link {{ Request::is('businessDeliveryServices*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Jasa Pengiriman Usaha</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('shippingCostVariables.index') }}"
                class="nav-link {{ Request::is('shippingCostVariables*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Variabel Biaya Pengiriman</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('shippingUseds.index') }}"
                class="nav-link {{ Request::is('shippingUseds*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengiriman yang digunakan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('salesDeliveryServices.index') }}"
                class="nav-link {{ Request::is('salesDeliveryServices*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Layanan Penjualan Pengiriman</p>
            </a>
        </li>
    </ul>
</li> --}}
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-credit-card"></i>
        <p>
            Pembayaran
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('businessPaymentMethods.index') }}"
                class="nav-link {{ Request::is('businessPaymentMethods*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Metode Pembayaran Usaha</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('balances.index') }}"
                class="nav-link {{ Request::is('balances*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Saldo</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item menu-is-closed menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-handshake"></i>
        <p>
            Transaksi
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('salesTransactions.index') }}"
                class="nav-link {{ Request::is('salesTransactions*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Transaksi Penjualan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('transactionStatuses.index') }}"
                class="nav-link {{ Request::is('transactionStatuses*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Status Transaksi</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('transactionProducts.index') }}"
                class="nav-link {{ Request::is('transactionProducts*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Transaksi Produk</p>
            </a>
        </li>
    </ul>
</li>
@endrole
