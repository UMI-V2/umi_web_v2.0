<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $city->id }}</p>
</div>

<!-- Id Provinsi Field -->
<div class="col-sm-12">
    {!! Form::label('province_id', 'Id Provinsi:') !!}
    <p>{{ $city->province_id }}</p>
</div>

<!-- Nama Kota Field -->
<div class="col-sm-12">
    {!! Form::label('city_name', 'Nama Kota:') !!}
    <p>{{ $city->city_name }}</p>
</div>

<!-- Kode Pos Field -->
<div class="col-sm-12">
    {!! Form::label('postal_code', 'Kode Pos:') !!}
    <p>{{ $city->postal_code }}</p>
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

