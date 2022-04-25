<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $transactionStatus->id }}</p>
</div>

<!-- Id Transaksi Penjualan Field -->
<div class="col-sm-12">
    {!! Form::label('id_transaksi_penjualan', 'Id Transaksi Penjualan:') !!}
    <p>{{ $transactionStatus->id_transaksi_penjualan }}</p>
</div>

<!-- Tanggal Pesanan Dibuat Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal_pesanan_dibuat', 'Tanggal Pesanan Dibuat:') !!}
    <p>{{ $transactionStatus->tanggal_pesanan_dibuat }}</p>
</div>

<!-- Tanggal Pembayaran Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal_pembayaran', 'Tanggal Pembayaran:') !!}
    <p>{{ $transactionStatus->tanggal_pembayaran }}</p>
</div>

<!-- Tanggal Pesanan Dikirimkan Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal_pesanan_dikirimkan', 'Tanggal Pesanan Dikirimkan:') !!}
    <p>{{ $transactionStatus->tanggal_pesanan_dikirimkan }}</p>
</div>

<!-- Tanggal Pesanan Diterima Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal_pesanan_diterima', 'Tanggal Pesanan Diterima:') !!}
    <p>{{ $transactionStatus->tanggal_pesanan_diterima }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $transactionStatus->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $transactionStatus->updated_at }}</p>
</div>

