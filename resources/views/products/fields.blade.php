<!-- Id Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_usaha', 'Nama Toko:') !!}
    {!! Form::select('id_usaha', $businesses, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Satuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_satuan', 'Satuan:') !!}
    {!! Form::select('id_satuan', $master_units, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama Produk:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::text('harga', null, ['class' => 'form-control']) !!}
</div>

<!-- Stok Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stok', 'Stok:') !!}
    {!! Form::number('stok', null, ['class' => 'form-control']) !!}
</div>

<!-- Kondisi Field -->
<div class="form-group col-sm-12">
    {!! Form::label('kondisi', 'Kondisi:', ['class' => 'form-check-label']) !!}
    <label class="form-check">
    {!! Form::radio('kondisi', "1", null, ['class' => 'form-check-input']) !!} Baru
</label>

<label class="form-check">
    {!! Form::radio('kondisi', "0", null, ['class' => 'form-check-input']) !!} Bekas
</label>

</div>


<!-- 'bootstrap / Toggle Switch Preorder Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('preorder', 'Preorder? ') !!}
    {!! Form::hidden('preorder', 0) !!}
    {!! Form::checkbox('preorder', 1, null,  ['data-bootstrap-switch']) !!}
</div>
