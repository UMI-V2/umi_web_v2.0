<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $product->id }}</p>
</div>

<!-- Id Usaha Field -->
<div class="col-sm-12">
    {!! Form::label('id_usaha', 'Id Usaha:') !!}
    <p>{{ $product->id_usaha }}</p>
</div>

<!-- Id Satuan Field -->
<div class="col-sm-12">
    {!! Form::label('id_satuan', 'Id Satuan:') !!}
    <p>{{ $product->id_satuan }}</p>
</div>

<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $product->nama }}</p>
</div>

<!-- Deskripsi Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{{ $product->deskripsi }}</p>
</div>

<!-- Harga Field -->
<div class="col-sm-12">
    {!! Form::label('harga', 'Harga:') !!}
    <p>{{ $product->harga }}</p>
</div>

<!-- Stok Field -->
<div class="col-sm-12">
    {!! Form::label('stok', 'Stok:') !!}
    <p>{{ $product->stok }}</p>
</div>

<!-- Kondisi Field -->
<div class="col-sm-12">
    {!! Form::label('kondisi', 'Kondisi:') !!}
    <p>{{ $product->kondisi }}</p>
</div>

<!-- Preorder Field -->
<div class="col-sm-12">
    {!! Form::label('preorder', 'Preorder:') !!}
    <p>{{ $product->preorder }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $product->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $product->updated_at }}</p>
</div>

