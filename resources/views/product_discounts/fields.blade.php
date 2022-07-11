<!-- Id Product Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_product', 'Nama Produk:') !!}
    {!! Form::select('id_product', $products, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Discount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_discount', 'Nama Diskon:') !!}
    {!! Form::select('id_discount', $discounts, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Harga Diskon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_diskon', 'Harga Diskon:') !!}
    {!! Form::number('harga_diskon', null, ['class' => 'form-control']) !!}
</div>

<!-- Batas Pembelian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('batas_pembelian', 'Batas Pembelian:') !!}
    {!! Form::number('batas_pembelian', null, ['class' => 'form-control']) !!}
</div>