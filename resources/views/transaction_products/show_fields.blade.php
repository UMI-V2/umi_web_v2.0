<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $transactionProduct->id }}</p>
</div>

<!-- Id Transaksi Penjualan Field -->
<div class="col-sm-12">
    {!! Form::label('id_transaksi_penjualan', 'Id Transaksi Penjualan:') !!}
    <p>{{ $transactionProduct->id_transaksi_penjualan }}</p>
</div>

<!-- Id Produk Field -->
<div class="col-sm-12">
    {!! Form::label('id_produk', 'Id Produk:') !!}
    <p>{{ $transactionProduct->id_produk }}</p>
</div>

<!-- Harga Produk Field -->
<div class="col-sm-12">
    {!! Form::label('harga_produk', 'Harga Produk:') !!}
    <p>{{ $transactionProduct->harga_produk }}</p>
</div>

<!-- Harga Diskon Field -->
<div class="col-sm-12">
    {!! Form::label('harga_diskon', 'Harga Diskon:') !!}
    <p>{{ $transactionProduct->harga_diskon }}</p>
</div>

<!-- Deskripsi Produk Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi_produk', 'Deskripsi Produk:') !!}
    <p>{{ $transactionProduct->deskripsi_produk }}</p>
</div>

<!-- Kondisi Field -->
<div class="col-sm-12">
    {!! Form::label('kondisi', 'Kondisi:') !!}
    <p>{{ $transactionProduct->kondisi }}</p>
</div>

<!-- Preorder Field -->
<div class="col-sm-12">
    {!! Form::label('preorder', 'Preorder:') !!}
    <p>{{ $transactionProduct->preorder }}</p>
</div>

<!-- Ongkir Field -->
<div class="col-sm-12">
    {!! Form::label('ongkir', 'Ongkir:') !!}
    <p>{{ $transactionProduct->ongkir }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $transactionProduct->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $transactionProduct->updated_at }}</p>
</div>

