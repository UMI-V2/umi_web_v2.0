<!-- Id Provinsi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province_id', 'Id Provinsi:') !!}
    {!! Form::select('province_id', $master_provinces, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Nama Kota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city_name', 'Nama Kota:') !!}
    {!! Form::text('city_name', null, ['class' => 'form-control']) !!}
</div>


<!-- Kode Pos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('postal_code', 'Kode Pos:') !!}
    {!! Form::text('postal_code', null, ['class' => 'form-control']) !!}
</div>