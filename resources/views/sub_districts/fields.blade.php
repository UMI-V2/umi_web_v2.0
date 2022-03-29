<!-- Id Provinsi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_provinsi', 'Id Provinsi:') !!}
    {!! Form::select('id_provinsi', $master_province, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Kota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_kota', 'Id Kota:') !!}
    {!! Form::select('id_kota', $cities, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Nama Kecamatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_kecamatan', 'Nama Kecamatan:') !!}
    {!! Form::text('nama_kecamatan', null, ['class' => 'form-control']) !!}
</div>