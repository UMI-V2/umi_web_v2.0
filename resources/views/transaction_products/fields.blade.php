<!-- Id Transaksi Penjualan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_transaksi_penjualan', 'Id Transaksi Penjualan:') !!}
    {!! Form::select('id_transaksi_penjualan', $sales_transactions, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Produk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_produk', 'Id Produk:') !!}
    {!! Form::select('id_produk', $products, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Harga Produk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_produk', 'Harga Produk:') !!}
    {!! Form::text('harga_produk', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Diskon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_diskon', 'Harga Diskon:') !!}
    {!! Form::text('harga_diskon', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Produk Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('deskripsi_produk', 'Deskripsi Produk:') !!}
    {!! Form::textarea('deskripsi_produk', null, ['class' => 'form-control']) !!}
</div>


<!-- Ongkir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ongkir', 'Ongkir:') !!}
    {!! Form::text('ongkir', null, ['class' => 'form-control']) !!}
</div>

<!-- Kondisi Field -->
<div class="form-group col-sm-12">
    {!! Form::label('kondisi', 'Kondisi', ['class' => 'form-check-label']) !!}
    <label class="form-check">
    {!! Form::radio('kondisi', "0", null, ['class' => 'form-check-input']) !!} Baru
</label>

<label class="form-check">
    {!! Form::radio('kondisi', "1", null, ['class' => 'form-check-input']) !!} Bekas
</label>

</div>


<!-- 'bootstrap / Toggle Switch Preorder Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('preorder', 'Preorder:') !!}
    {!! Form::hidden('preorder', 0) !!}
    {!! Form::checkbox('preorder', 1, null,  ['data-bootstrap-switch']) !!}
</div>

