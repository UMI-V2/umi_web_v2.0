<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $masterProductCategory->id }}</p>
</div>

<!-- Nama Kategori Produk Field -->
<div class="col-sm-12">
    {!! Form::label('nama_kategori_produk', 'Nama Kategori Produk:') !!}
    <p>{{ $masterProductCategory->nama_kategori_produk }}</p>
</div>

<!-- Status Kategori Produk Field -->
<div class="col-sm-12">
    {!! Form::label('status_kategori_produk', 'Status Kategori Produk:') !!}
    <p>{{ $masterProductCategory->status_kategori_produk }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $masterProductCategory->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $masterProductCategory->updated_at }}</p>
</div>

