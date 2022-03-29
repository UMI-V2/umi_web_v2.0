<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $subDistrict->id }}</p>
</div>

<!-- Id Provinsi Field -->
<div class="col-sm-12">
    {!! Form::label('id_provinsi', 'Id Provinsi:') !!}
    <p>{{ $subDistrict->id_provinsi }}</p>
</div>

<!-- Id Kota Field -->
<div class="col-sm-12">
    {!! Form::label('id_kota', 'Id Kota:') !!}
    <p>{{ $subDistrict->id_kota }}</p>
</div>

<!-- Nama Kecamatan Field -->
<div class="col-sm-12">
    {!! Form::label('nama_kecamatan', 'Nama Kecamatan:') !!}
    <p>{{ $subDistrict->nama_kecamatan }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $subDistrict->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $subDistrict->updated_at }}</p>
</div>

