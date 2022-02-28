
<li class="nav-item">
    
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
    <a href="{{ route('masterStatusBusinesses.index') }}"
       class="nav-link {{ Request::is('masterStatusBusinesses*') ? 'active' : '' }}">
        <p>Master Status Usaha</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('masterUnits.index') }}"
       class="nav-link {{ Request::is('masterUnits*') ? 'active' : '' }}">
        <p>Master Satuan</p>
    </a>
</li>





<li class="nav-item">
    <a href="{{ route('masterPrivileges.index') }}"
       class="nav-link {{ Request::is('masterPrivileges*') ? 'active' : '' }}">
        <p>Master Hak Akses Pengguna</p>
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


