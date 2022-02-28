<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $masterTransactionCategory->id }}</p>
</div>

<!-- Nama Kategori Transaksi Field -->
<div class="col-sm-12">
    {!! Form::label('nama_kategori_transaksi', 'Nama Kategori Transaksi:') !!}
    <p>{{ $masterTransactionCategory->nama_kategori_transaksi }}</p>
</div>

<!-- Deskripsi Kategori Transaksi Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi_kategori_transaksi', 'Deskripsi Kategori Transaksi:') !!}
    <p>{{ $masterTransactionCategory->deskripsi_kategori_transaksi }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $masterTransactionCategory->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $masterTransactionCategory->updated_at }}</p>
</div>

