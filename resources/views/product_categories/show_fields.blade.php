{{-- <!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $productCategory->id }}</p>
</div>

<!-- Id Produk Field -->
<div class="col-sm-12">
    {!! Form::label('id_produk', 'Id Produk:') !!}
    <p>{{ $productCategory->id_produk }}</p>
</div>

<!-- Id Master Kategori Produk Field -->
<div class="col-sm-12">
    {!! Form::label('id_master_kategori_produk', 'Id Master Kategori Produk:') !!}
    <p>{{ $productCategory->id_master_kategori_produk }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $productCategory->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $productCategory->updated_at }}</p>
</div> --}}

<div class="row">
    @foreach ($product->product_category as $product)

        {{-- <!-- Id Field -->
        <div class="col-sm-12">
            {!! Form::label('id', 'Id:') !!}
            <p>{{ $product->id }}</p>
        </div> --}}

        {{-- <!-- Id Produk Field -->
        <div class="col-sm-12">
            {!! Form::label('id_produk', 'Id Produk:') !!}
            <p>{{ $product->nama }}</p>
        </div> --}}

        <!-- Id Master Kategori Produk Field -->
        <div class="col-sm-12">
            {!! Form::label('id_master_kategori_produk', 'Kategori:') !!}
            <p>{{ $product->master_product_categories->nama_kategori_produk}}</p>
        </div>

        <!-- Created At Field -->
        <div class="col-sm-6">
            {!! Form::label('created_at', 'Created At:') !!}
            <p>{{ $product->created_at }}</p>
        </div>

        <!-- Updated At Field -->
        <div class="col-sm-6">
            {!! Form::label('updated_at', 'Updated At:') !!}
            <p>{{ $product->updated_at }}</p>
        </div>

        <hr style="height:2px; width:100%; border-width:0; color:white; background-color:white">

    @endforeach
</div>
