
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


