<!-- Id Provinsi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province_id', 'Id Provinsi:') !!}
    {!! Form::select('province_id', $master_province, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Kota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_kota', 'Id Kota:') !!}
    {!! Form::select('id_kota', $master_cities, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Nama Kecamatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subdistrict_name', 'Nama Kecamatan:') !!}
    {!! Form::text('subdistrict_name', null, ['class' => 'form-control']) !!}
</div>