<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $balances->id }}</p>
</div>

<!-- Id Kategori Transaksi Field -->
<div class="col-sm-12">
    {!! Form::label('id_kategori_transaksi', 'Id Kategori Transaksi:') !!}
    <p>{{ $balances->id_kategori_transaksi }}</p>
</div>

<!-- Id Transaksi Penjualan Field -->
<div class="col-sm-12">
    {!! Form::label('id_transaksi_penjualan', 'Id Transaksi Penjualan:') !!}
    <p>{{ $balances->id_transaksi_penjualan }}</p>
</div>

<!-- Pengeluaran Field -->
<div class="col-sm-12">
    {!! Form::label('pengeluaran', 'Pengeluaran:') !!}
    <p>{{ $balances->pengeluaran }}</p>
</div>

<!-- Pemasukan Field -->
<div class="col-sm-12">
    {!! Form::label('pemasukan', 'Pemasukan:') !!}
    <p>{{ $balances->pemasukan }}</p>
</div>

<!-- Deskripsi Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{{ $balances->deskripsi }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $balances->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $balances->updated_at }}</p>
</div>

