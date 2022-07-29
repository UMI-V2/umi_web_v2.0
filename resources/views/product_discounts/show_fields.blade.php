<!-- Id Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $productDiscount->id }}</p>
</div> --}}

{{-- <div class="row"> --}}

    {{-- <!-- Id Product Field -->
    <div class="col-sm-12">
        {!! Form::label('id_product', 'Nama Produk:') !!}
        <p>{{ $product->nama }}</p>
    </div> --}}
    {{-- <hr style="height:2px; width:100%; border-width:0; color:white; background-color:white"> --}}
    {{-- <div class="row"> --}}
        {{-- @foreach ($product->discounts as $product)
            <!-- Id Discount Field -->
            <div class="col-sm-12">
                {!! Form::label('id_discount', 'Nama Promo:') !!}
                <p>{{ $product->nama_promo }}</p>
            </div>
            <!-- Id Discount Field -->
            <div class="col-sm-12">
                {!! Form::label('id_discount', 'Nama Promo:') !!}
                <p>{{ $product->nama_promo }}</p>
            </div>

            <!-- Harga Diskon Field -->
            <div class="col-sm-6">
                {!! Form::label('harga_diskon', 'Harga Diskon:') !!}
                <p>{{ $product }}</p>
            </div>

            <!-- Batas Pembelian Field -->
            <div class="col-sm-6">
                {!! Form::label('batas_pembelian', 'Batas Pembelian:') !!}
                <p>{{ $product->batas_pembelian }}</p>
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
            </div> --}}

    {{-- </div> --}}
    {{-- <hr style="height:2px; width:100%; border-width:0; color:white; background-color:white">
    @endforeach
</div> --}}


<!-- Id Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $discount->id }}</p>
</div> --}}

<div class="row">
    @foreach ($product->discounts as $product)
        {{-- <!-- Id Produk Field -->
        <div class="col-sm-12">
            {!! Form::label('id_usaha', 'Nama Usaha:') !!}
            <p>{{ $business->nama_usaha }}</p>
        </div> --}}

        <!-- Nama Promo Field -->
        <div class="col-sm-12">
            {!! Form::label('nama_promo', 'Nama Promo:') !!}
            <p>{{ $product->nama_promo }}</p>
        </div>

        <!-- Waktu Mulai Field -->
        <div class="col-sm-6">
            {!! Form::label('waktu_mulai', 'Waktu Mulai:') !!}
            <p>{{ $product->waktu_mulai }}</p>
        </div>

        <!-- Waktu Berakhir Field -->
        <div class="col-sm-6">
            {!! Form::label('waktu_berakhir', 'Waktu Berakhir:') !!}
            <p>{{ $product->waktu_berakhir }}</p>
        </div>
        
        <!-- Type Field -->
        <div class="col-sm-6">
            {!! Form::label('type', 'Tipe Diskon:') !!}
            <p>{{ $product->type == '0' ? 'Persentase' : 'Potongan Harga' }}</p>
        </div>
        
        <!-- Harga Field -->
        <div class="col-sm-6">
            {!! Form::label('potongan', 'Potongan Harga:') !!}
            <p>{{ $product->type == '0' ? $product->potongan.' %' : "Rp. ".number_format($product->potongan, 0, ',', '.') }}</p>
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

        <!-- Batas Pembelian Field -->
        {{-- <div class="col-sm-12">
    {!! Form::label('batas_pembelian', 'Batas Pembelian:') !!}
    <p>{{ $business->batas_pembelian }}</p>
</div> --}}
    @endforeach
</div>
