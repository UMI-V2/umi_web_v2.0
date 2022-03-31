<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $discount->id }}</p>
</div>

<!-- Id Produk Field -->
<div class="col-sm-12">
    {!! Form::label('id_produk', 'Id Produk:') !!}
    <p>{{ $discount->id_produk }}</p>
</div>

<!-- Nama Promo Field -->
<div class="col-sm-12">
    {!! Form::label('nama_promo', 'Nama Promo:') !!}
    <p>{{ $discount->nama_promo }}</p>
</div>

<!-- Waktu Mulai Field -->
<div class="col-sm-12">
    {!! Form::label('waktu_mulai', 'Waktu Mulai:') !!}
    <p>{{ $discount->waktu_mulai }}</p>
</div>

<!-- Waktu Berakhir Field -->
<div class="col-sm-12">
    {!! Form::label('waktu_berakhir', 'Waktu Berakhir:') !!}
    <p>{{ $discount->waktu_berakhir }}</p>
</div>

<!-- Harga Field -->
<div class="col-sm-12">
    {!! Form::label('harga', 'Harga:') !!}
    <p>{{ $discount->harga }}</p>
</div>

<!-- Batas Pembelian Field -->
<div class="col-sm-12">
    {!! Form::label('batas_pembelian', 'Batas Pembelian:') !!}
    <p>{{ $discount->batas_pembelian }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $discount->type }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $discount->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $discount->updated_at }}</p>
</div>

