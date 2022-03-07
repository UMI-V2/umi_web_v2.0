<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $masterStatusUser->id }}</p>
</div>

<!-- Nama Status Pengguna Field -->
<div class="col-sm-12">
    {!! Form::label('nama_status_pengguna', 'Nama Status Pengguna:') !!}
    <p>{{ $masterStatusUser->nama_status_pengguna }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $masterStatusUser->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $masterStatusUser->updated_at }}</p>
</div>

