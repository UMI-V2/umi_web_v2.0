<!-- Id Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $masterBusinessCategory->id }}</p>
</div> --}}

<!-- Nama Kategori Usaha Field -->
<div class="col-sm-12">
    {!! Form::label('nama_kategori_usaha', 'Nama Kategori Usaha:') !!}
    <p>{{ $masterBusinessCategory->nama_kategori_usaha }}</p>
</div>

<!-- Status Kategori Usaha Field -->
<div class="col-sm-12">
    {!! Form::label('status_kategori_usaha', 'Status Kategori Usaha:') !!}
    <p>{{ $masterBusinessCategory->status_kategori_usaha == 1 ? 'Jasa' : 'Barang' }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $masterBusinessCategory->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $masterBusinessCategory->updated_at }}</p>
</div>

