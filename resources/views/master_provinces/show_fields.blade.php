<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $masterProvince->id }}</p>
</div>

<!-- Nama Provinsi Field -->
<div class="col-sm-12">
    {!! Form::label('nama_provinsi', 'Nama Provinsi:') !!}
    <p>{{ $masterProvince->nama_provinsi }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $masterProvince->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $masterProvince->updated_at }}</p>
</div>

