<!-- Id Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $productDiscount->id }}</p>
</div> --}}

<!-- Id Product Field -->
<div class="col-sm-12">
    {!! Form::label('id_product', 'Nama Produk:') !!}
    <p>{{ $productDiscount->products->nama }}</p>
</div>

<!-- Id Discount Field -->
<div class="col-sm-12">
    {!! Form::label('id_discount', 'Nama Promo:') !!}
    <p>{{ $productDiscount->discounts->nama_promo }}</p>
</div>

<!-- Harga Diskon Field -->
<div class="col-sm-12">
    {!! Form::label('harga_diskon', 'Harga Diskon:') !!}
    <p>{{ $productDiscount->harga_diskon }}</p>
</div>

<!-- Batas Pembelian Field -->
<div class="col-sm-12">
    {!! Form::label('batas_pembelian', 'Batas Pembelian:') !!}
    <p>{{ $productDiscount->batas_pembelian }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $productDiscount->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $productDiscount->updated_at }}</p>
</div>

