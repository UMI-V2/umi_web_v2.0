<!-- Id Produk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_produk', 'Id Produk:') !!}
    {!! Form::select('id_produk', $products, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Transaksi Penjualan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_transaksi_penjualan', 'Id Transaksi Penjualan:') !!}
    {!! Form::select('id_transaksi_penjualan', $sales_transactions, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Rating Field -->
<div class="form-group col-sm-12">
    {!! Form::label('rating', 'Rating', ['class' => 'form-check-label']) !!}
    <label class="form-check">
    {!! Form::radio('rating', "1", null, ['class' => 'form-check-input']) !!} 1
</label>

<label class="form-check">
    {!! Form::radio('rating', "2", null, ['class' => 'form-check-input']) !!} 2
</label>

<label class="form-check">
    {!! Form::radio('rating', "3", null, ['class' => 'form-check-input']) !!} 3
</label>

<label class="form-check">
    {!! Form::radio('rating', "4", null, ['class' => 'form-check-input']) !!} 4
</label>

<label class="form-check">
    {!! Form::radio('rating', "5", null, ['class' => 'form-check-input']) !!} 5
</label>

</div>


<!-- Ulasan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('ulasan', 'Ulasan:') !!}
    {!! Form::textarea('ulasan', null, ['class' => 'form-control']) !!}
</div>