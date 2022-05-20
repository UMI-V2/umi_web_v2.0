<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $masterCity->id }}</p>
</div>

<!-- Id Provinsi Field -->
<div class="col-sm-12">
    {!! Form::label('province_id', 'Id Provinsi:') !!}
    <p>{{ $masterCity->province_id }}</p>
</div>

<!-- Nama Kota Field -->
<div class="col-sm-12">
    {!! Form::label('city_name', 'Nama Kota:') !!}
    <p>{{ $masterCity->city_name }}</p>
</div>

<!-- Kode Pos Field -->
<div class="col-sm-12">
    {!! Form::label('postal_code', 'Kode Pos:') !!}
    <p>{{ $masterCity->postal_code }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $masterCity->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $masterCity->updated_at }}</p>
</div>

