<!-- Id Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $businessCategory->id }}</p>
</div> --}}

<!-- Id Usaha Field -->
<div class="col-sm-12">
    {!! Form::label('id_usaha', 'Kategori:') !!}
    <p>{{ $business->category }}</p>
</div>

<!-- Id Master Kategori Usaha Field -->
<div class="col-sm-12">
    {!! Form::label('id_master_kategori_usaha', 'Nama Master Kategori:') !!}
    <p>{{ $business->master_business_categories }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $business->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $business->updated_at }}</p>
</div>

