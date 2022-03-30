<!-- <button class="dropdown-btn nav-link">
    <p><i class="fa fa-caret-down"></i> Master Data </p>
</button>

<div class="dropdown-container">
    
</div> -->


<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>Master Pengguna</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('masterProductCategories.index') }}"
       class="nav-link {{ Request::is('masterProductCategories*') ? 'active' : '' }}">
        <p>Master Kategori Produk</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('masterBusinessCategories.index') }}"
       class="nav-link {{ Request::is('masterBusinessCategories*') ? 'active' : '' }}">
        <p>Master Kategori Usaha</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('masterPrivileges.index') }}"
       class="nav-link {{ Request::is('masterPrivileges*') ? 'active' : '' }}">
        <p>Master Akses Pengguna</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('masterUnits.index') }}"
       class="nav-link {{ Request::is('masterUnits*') ? 'active' : '' }}">
        <p>Master Satuan</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('masterStatusUsers.index') }}"
       class="nav-link {{ Request::is('masterStatusUsers*') ? 'active' : '' }}">
        <p>Master Status Pengguna</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('masterStatusBusinesses.index') }}"
       class="nav-link {{ Request::is('masterStatusBusinesses*') ? 'active' : '' }}">
        <p>Master Status Usaha</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('masterProvinces.index') }}"
       class="nav-link {{ Request::is('masterProvinces*') ? 'active' : '' }}">
        <p>Master Provinsi</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('masterDeliveryServices.index') }}"
       class="nav-link {{ Request::is('masterDeliveryServices*') ? 'active' : '' }}">
        <p>Master Jasa Pengiriman</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('masterPaymentMethods.index') }}"
       class="nav-link {{ Request::is('masterPaymentMethods*') ? 'active' : '' }}">
        <p>Master Metode Pembayaran</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('masterTransactionCategories.index') }}"
       class="nav-link {{ Request::is('masterTransactionCategories*') ? 'active' : '' }}">
        <p>Master Kategori Transaksi</p>
    </a>
</li>





<li class="nav-item">
    <a href="{{ route('businesses.index') }}"
       class="nav-link {{ Request::is('businesses*') ? 'active' : '' }}">
        <p>Usaha</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('businessFiles.index') }}"
       class="nav-link {{ Request::is('businessFiles*') ? 'active' : '' }}">
        <p>File Usaha</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('businessCategories.index') }}"
       class="nav-link {{ Request::is('businessCategories*') ? 'active' : '' }}">
        <p>Kategori Usaha</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('cities.index') }}"
       class="nav-link {{ Request::is('cities*') ? 'active' : '' }}">
        <p>Kota</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('subDistricts.index') }}"
       class="nav-link {{ Request::is('subDistricts*') ? 'active' : '' }}">
        <p>Kecamatan</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('addresses.index') }}"
       class="nav-link {{ Request::is('addresses*') ? 'active' : '' }}">
        <p>Alamat</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('products.index') }}"
       class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
        <p>Produk</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('productCategories.index') }}"
       class="nav-link {{ Request::is('productCategories*') ? 'active' : '' }}">
        <p>Kategori Produk</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('openHours.index') }}"
       class="nav-link {{ Request::is('openHours*') ? 'active' : '' }}">
        <p>Jam Buka</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('businessDeliveryServices.index') }}"
       class="nav-link {{ Request::is('businessDeliveryServices*') ? 'active' : '' }}">
        <p>Jasa Pengiriman</p>
    </a>
</li>


