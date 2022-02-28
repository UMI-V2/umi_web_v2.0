<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $masterUnit->id }}</p>
</div>

<!-- Nama Satuan Field -->
<div class="col-sm-12">
    {!! Form::label('nama_satuan', 'Nama Satuan:') !!}
    <p>{{ $masterUnit->nama_satuan }}</p>
</div>

<!-- Singkatan Satuan Field -->
<div class="col-sm-12">
    {!! Form::label('singkatan_satuan', 'Singkatan Satuan:') !!}
    <p>{{ $masterUnit->singkatan_satuan }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $masterUnit->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $masterUnit->updated_at }}</p>
</div>

