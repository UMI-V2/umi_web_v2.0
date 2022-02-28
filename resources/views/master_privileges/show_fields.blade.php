<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $masterPrivilege->id }}</p>
</div>

<!-- Nama Hak Akses Pengguna Field -->
<div class="col-sm-12">
    {!! Form::label('nama_hak_akses_pengguna', 'Nama Hak Akses Pengguna:') !!}
    <p>{{ $masterPrivilege->nama_hak_akses_pengguna }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $masterPrivilege->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $masterPrivilege->updated_at }}</p>
</div>

