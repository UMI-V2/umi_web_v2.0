<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('province_id', 'Id:') !!}
    <p>{{ $masterProvince->province_id }}</p>
</div>

<!-- Nama Provinsi Field -->
<div class="col-sm-12">
    {!! Form::label('province_name', 'Nama Provinsi:') !!}
    <p>{{ $masterProvince->province_name }}</p>
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

