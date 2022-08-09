<!-- Id Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $product->id }}</p>
</div> --}}

<div class="row">

<!-- Id Usaha Field -->
<div class="col-sm-6">
    {!! Form::label('id_usaha', 'Nama Toko:') !!}
    <p>{{ $product->businesses->nama_usaha }}</p>
</div>

<!-- Id Satuan Field -->
<div class="col-sm-6">
    {!! Form::label('id_satuan', 'Satuan:') !!}
    <p>{{ $product->master_units->nama_satuan }}</p>
</div>

<!-- Nama Field -->
<div class="col-sm-6">
    {!! Form::label('nama', 'Nama Produk:') !!}
    <p>{{ $product->nama }}</p>
</div>

<!-- Deskripsi Field -->
<div class="col-sm-6">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{{ $product->deskripsi }}</p>
</div>

<!-- Harga Field -->
<div class="col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    <p>{{ $product->harga == '0' ? 'Gratis' : "Rp. ".number_format($product->harga, 0, ',', '.') }}</p>
</div>

<!-- Stok Field -->
<div class="col-sm-6">
    {!! Form::label('stok', 'Stok:') !!}
    <p>{{ $product->stok }}</p>
</div>
    
<!-- Kondisi Field -->
<div class="col-sm-6">
    {!! Form::label('kondisi', 'Kondisi:') !!}
    <p>{{ $product->kondisi == '1' ? 'Baru' : 'Bekas' }}</p>
</div>

<!-- Preorder Field -->
<div class="col-sm-6">
    {!! Form::label('preorder', 'Preorder:') !!}
    <p>{{ $product->preorder == '1' ? 'Ya, Barang ini dapat di preorder' : 'Tidak, Barang ini tidak dapat di preorder'  }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $product->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $product->updated_at }}</p>
</div>

</div>