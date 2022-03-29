<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $city->id }}</p>
</div>

<!-- Id Provinsi Field -->
<div class="col-sm-12">
    {!! Form::label('id_provinsi', 'Id Provinsi:') !!}
    <p>{{ $city->id_provinsi }}</p>
</div>

<!-- Nama Kota Field -->
<div class="col-sm-12">
    {!! Form::label('nama_kota', 'Nama Kota:') !!}
    <p>{{ $city->nama_kota }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $city->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $city->updated_at }}</p>
</div>

