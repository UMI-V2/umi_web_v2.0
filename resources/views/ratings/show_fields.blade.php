<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $rating->id }}</p>
</div>

<!-- Id Produk Field -->
<div class="col-sm-12">
    {!! Form::label('id_produk', 'Id Produk:') !!}
    <p>{{ $rating->id_produk }}</p>
</div>

<!-- Id Transaksi Penjualan Field -->
<div class="col-sm-12">
    {!! Form::label('id_transaksi_penjualan', 'Id Transaksi Penjualan:') !!}
    <p>{{ $rating->id_transaksi_penjualan }}</p>
</div>

<!-- Rating Field -->
<div class="col-sm-12">
    {!! Form::label('rating', 'Rating:') !!}
    <p>{{ $rating->rating }}</p>
</div>

<!-- Ulasan Field -->
<div class="col-sm-12">
    {!! Form::label('ulasan', 'Ulasan:') !!}
    <p>{{ $rating->ulasan }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $rating->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $rating->updated_at }}</p>
</div>

