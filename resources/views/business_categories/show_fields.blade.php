<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $businessCategory->id }}</p>
</div>

<!-- Id Usaha Field -->
<div class="col-sm-12">
    {!! Form::label('id_usaha', 'Id Usaha:') !!}
    <p>{{ $businessCategory->id_usaha }}</p>
</div>

<!-- Id Master Kategori Usaha Field -->
<div class="col-sm-12">
    {!! Form::label('id_master_kategori_usaha', 'Id Master Kategori Usaha:') !!}
    <p>{{ $businessCategory->id_master_kategori_usaha }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $businessCategory->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $businessCategory->updated_at }}</p>
</div>

