{{-- <!-- Id Field -->
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
</div> --}}


{{-- <!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $product->ratings->id }}</p>
</div>

<!-- Id Produk Field -->
<div class="col-sm-12">
    {!! Form::label('id_produk', 'Id Produk:') !!}
    <p>{{ $product->nama }}</p>
</div>

<!-- Id Transaksi Penjualan Field -->
<div class="col-sm-12">
    {!! Form::label('id_transaksi_penjualan', 'Id Transaksi Penjualan:') !!}
    <p>{{ $product->ratings->id_transaksi_penjualan }}</p>
</div> --}}

<div class="row">

    @if ($product->ratings == null)
        <div class="col-sm-6">
            {!! Form::label('rating', 'Rating:') !!}
            <p>-</p>
        </div>
        <div class="col-sm-6">
            {!! Form::label('ulasan', 'Ulasan:') !!}
            <p>-</p>
        </div>
        <div class="col-sm-6">
            {!! Form::label('created_at', 'Created At:') !!}
            <p>-</p>
        </div>
        <div class="col-sm-6">
            {!! Form::label('updated_at', 'Updated At:') !!}
            <p>-</p>
        </div>
    @else
        @foreach ($product->ratings as $rating)
            <!-- Rating Field -->
            <div class="col-sm-6">
                {!! Form::label('rating', 'Rating:') !!}
                <p><?php
                switch ($product->ratings->rating) {
                    case '1':
                        echo '1 - Sangat Kurang';
                        break;
                    case '2':
                        echo '2 - Kurang';
                        break;
                    case '3':
                        echo '3 - Cukup';
                        break;
                    case '4':
                        echo '4 - Baik';
                        break;
                    case '5':
                        echo '5 - Sangat Baik';
                        break;
                    default:
                        echo '-';
                        break;
                }
                ?> </p>
            </div>

            <!-- Ulasan Field -->
            <div class="col-sm-6">
                {!! Form::label('ulasan', 'Ulasan:') !!}
                <p>{{ $product->ratings->ulasan }}</p>
            </div>

            <!-- Created At Field -->
            <div class="col-sm-6">
                {!! Form::label('created_at', 'Created At:') !!}
                <p>{{ $product->ratings->created_at }}</p>
            </div>

            <!-- Updated At Field -->
            <div class="col-sm-6">
                {!! Form::label('updated_at', 'Updated At:') !!}
                <p>{{ $product->ratings->updated_at }}</p>
            </div>
            <hr style="height:2px; width:100%; border-width:0; color:white; background-color:white">
        @endforeach

    @endif

</div>
