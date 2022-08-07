{{-- <!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $masterProductCategory->id }}</p>
</div> --}}

<div class="row">

<!-- Nama Kategori Produk Field -->
<div class="col-sm-6">
    {!! Form::label('nama_kategori_produk', 'Jenis Kategori:') !!}
    <p>{{ $masterProductCategory->nama_kategori_produk }}</p>
</div>

<!-- Status Kategori Produk Field -->
<div class="col-sm-6">
    {!! Form::label('status_kategori_produk', 'Status Kategori:') !!}
    <p>{{ $masterProductCategory->status_kategori_produk == '1' ? 'Jasa' : 'Barang' }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $masterProductCategory->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $masterProductCategory->updated_at }}</p>
</div>

</div>