<!-- Id Kategori Transaksi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_kategori_transaksi', 'Id Kategori Transaksi:') !!}
    {!! Form::select('id_kategori_transaksi', $master_transaction_categories, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Transaksi Penjualan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_transaksi_penjualan', 'Id Transaksi Penjualan:') !!}
    {!! Form::select('id_transaksi_penjualan', $sales_transactions, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Pengeluaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pengeluaran', 'Pengeluaran:') !!}
    {!! Form::text('pengeluaran', null, ['class' => 'form-control']) !!}
</div>

<!-- Pemasukan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pemasukan', 'Pemasukan:') !!}
    {!! Form::text('pemasukan', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>