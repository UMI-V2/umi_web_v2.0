<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $jurusan->id }}</p>
</div>

<!-- Nama Jurusan Field -->
<div class="col-sm-12">
    {!! Form::label('nama_jurusan', 'Nama Jurusan:') !!}
    <p>{{ $jurusan->nama_jurusan }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $jurusan->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $jurusan->updated_at }}</p>
</div>

