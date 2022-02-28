<!-- Nama Kategori Produk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_kategori_produk', 'Nama Kategori Produk:') !!}
    {!! Form::text('nama_kategori_produk', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Kategori Produk Field -->
<div class="form-group col-sm-12">
    <label>{!! Form::label('status_kategori_produk', 'Status Kategori Produk', ['class' => 'form-check-label']) !!}</label>
    <div class="form-check">
    {!! Form::radio('status_kategori_produk', "Barang", null, ['class' => 'form-check-input']) !!} Barang
</div>

<div class="form-check">
    {!! Form::radio('status_kategori_produk', "Jasa", null, ['class' => 'form-check-input']) !!} Jasa
</div>

</div>
