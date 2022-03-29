<!-- Id Provinsi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_provinsi', 'Id Provinsi:') !!}
    {!! Form::select('id_provinsi', $master_provinces, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Nama Kota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_kota', 'Nama Kota:') !!}
    {!! Form::text('nama_kota', null, ['class' => 'form-control']) !!}
</div>