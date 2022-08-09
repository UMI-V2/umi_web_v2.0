<div class="row">

<!-- Id Field -->
{{-- <div class="col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $transactionProduct->id }}</p>
</div> --}}

<!-- Id Transaksi Penjualan Field -->
<div class="col-sm-12">
    {!! Form::label('id_transaksi_penjualan', 'No Pemesanan:') !!}
    <p>{{ $transactionProduct->sales_transactions->no_pemesanan }}</p>
</div>

<!-- Id Produk Field -->
<div class="col-sm-6">
    {!! Form::label('id_produk', 'Nama Produk:') !!}
    <p>{{ $transactionProduct->products->nama }}</p>
</div>

<!-- Harga Produk Field -->
<div class="col-sm-6">
    {!! Form::label('harga_produk', 'Harga Produk:') !!}
    <p>{{ $transactionProduct->harga_produk == '0' ? 'Gratis' : "Rp. ".number_format($transactionProduct->harga_produk, 0, ',', '.') }}</p>
</div>

<!-- Harga Diskon Field -->
<div class="col-sm-6">
    {!! Form::label('harga_diskon', 'Harga Diskon:') !!}
    <p>{{ $transactionProduct->harga_diskon == '0' ? 'Gratis' : "Rp. ".number_format($transactionProduct->harga_diskon, 0, ',', '.') }}</p>
</div>

<!-- Deskripsi Produk Field -->
<div class="col-sm-6">
    {!! Form::label('deskripsi_produk', 'Deskripsi Produk:') !!}
    <p>{{ $transactionProduct->deskripsi_produk }}</p>
</div>

<!-- Kondisi Field -->
<div class="col-sm-6">
    {!! Form::label('kondisi', 'Kondisi:') !!}
    <p>{{ $transactionProduct->kondisi == '1' ? 'Baru' : 'Bekas' }}</p>
</div>

<!-- Preorder Field -->
<div class="col-sm-6">
    {!! Form::label('preorder', 'Preorder:') !!}
    <p>{{ $transactionProduct->preorder == '1' ? 'Ya, Barang ini dapat di preorder' : 'Tidak, Barang ini tidak dapat di preorder' }}</p>
</div>

{{-- <!-- Ongkir Field -->
<div class="col-sm-6">
    {!! Form::label('ongkir', 'Ongkir:') !!}
    <p>{{ $transactionProduct->ongkir }}</p>
</div> --}}

<!-- Created At Field -->
<div class="col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $transactionProduct->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $transactionProduct->updated_at }}</p>
</div>

</div>