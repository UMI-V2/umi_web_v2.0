<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $masterStatusBusiness->id }}</p>
</div>

<!-- Nama Status Usaha Field -->
<div class="col-sm-12">
    {!! Form::label('nama_status_usaha', 'Nama Status Usaha:') !!}
    <p>{{ $masterStatusBusiness->nama_status_usaha }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $masterStatusBusiness->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $masterStatusBusiness->updated_at }}</p>
</div>

