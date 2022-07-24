<!-- Nama Kategori Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_kategori_usaha', 'Nama Kategori Usaha:') !!}
    {!! Form::text('nama_kategori_usaha', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Kategori Usaha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status_kategori_usaha', 'Status Kategori Usaha', ['class' => 'form-check-label']) !!}
    <label class="form-check">
    {!! Form::radio('status_kategori_usaha', "0", null, ['class' => 'form-check-input']) !!} Barang
</label>

<label class="form-check">
    {!! Form::radio('status_kategori_usaha', "1", null, ['class' => 'form-check-input']) !!} Jasa
</label>

</div>
