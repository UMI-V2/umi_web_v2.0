<!-- Id Produk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_produk', 'Id Produk:') !!}
    {!! Form::select('id_produk', $products, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Master Kategori Produk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_master_kategori_produk', 'Id Master Kategori Produk:') !!}
    {!! Form::select('id_master_kategori_produk', $master_product_cateories, null, ['class' => 'form-control custom-select']) !!}
</div>
