<!-- Id Product Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_product', 'Id Product:') !!}
    {!! Form::select('id_product', $products, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Is Paid By Seller Field -->
<div class="form-group col-sm-12">
    {!! Form::label('is_paid_by_seller', 'Is Paid By Seller', ['class' => 'form-check-label']) !!}
    <label class="form-check">
    {!! Form::radio('is_paid_by_seller', "1", null, ['class' => 'form-check-input']) !!} Dibayar Penjual
</label>

<label class="form-check">
    {!! Form::radio('is_paid_by_seller', "0", null, ['class' => 'form-check-input']) !!} Dibayar Pembeli
</label>

</div>


<!-- Berat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('berat', 'Berat:') !!}
    {!! Form::text('berat', null, ['class' => 'form-control']) !!}
</div>

<!-- Lebar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lebar', 'Lebar:') !!}
    {!! Form::text('lebar', null, ['class' => 'form-control']) !!}
</div>

<!-- Panjang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('panjang', 'Panjang:') !!}
    {!! Form::text('panjang', null, ['class' => 'form-control']) !!}
</div>

<!-- Tinggi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tinggi', 'Tinggi:') !!}
    {!! Form::text('tinggi', null, ['class' => 'form-control']) !!}
</div>