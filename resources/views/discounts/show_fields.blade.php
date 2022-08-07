<!-- Id Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $discount->id }}</p>
</div> --}}

<div class="row">
    @foreach ($business->discounts as $business)
        {{-- <!-- Id Produk Field -->
        <div class="col-sm-12">
            {!! Form::label('id_usaha', 'Nama Usaha:') !!}
            <p>{{ $business->nama_usaha }}</p>
        </div> --}}

        <!-- Nama Promo Field -->
        <div class="col-sm-12">
            {!! Form::label('nama_promo', 'Nama Promo:') !!}
            <p>{{ $business->nama_promo }}</p>
        </div>

        <!-- Waktu Mulai Field -->
        <div class="col-sm-6">
            {!! Form::label('waktu_mulai', 'Waktu Mulai:') !!}
            <p>{{ $business->waktu_mulai }}</p>
        </div>

        <!-- Waktu Berakhir Field -->
        <div class="col-sm-6">
            {!! Form::label('waktu_berakhir', 'Waktu Berakhir:') !!}
            <p>{{ $business->waktu_berakhir }}</p>
        </div>
        
        <!-- Type Field -->
        <div class="col-sm-6">
            {!! Form::label('type', 'Tipe Diskon:') !!}
            <p>{{ $business->type == '0' ? 'Persentase' : 'Potongan Harga' }}</p>
        </div>

        <!-- Harga Field -->
        <div class="col-sm-6">
            {!! Form::label('potongan', 'Potongan Harga:') !!}
            <p>{{ $business->type == '0' ? $business->potongan.' %' : "Rp. ".number_format($business->potongan, 0, ',', '.') }}</p>
        </div>

        <!-- Created At Field -->
        <div class="col-sm-6">
            {!! Form::label('created_at', 'Created At:') !!}
            <p>{{ $business->created_at }}</p>
        </div>

        <!-- Updated At Field -->
        <div class="col-sm-6">
            {!! Form::label('updated_at', 'Updated At:') !!}
            <p>{{ $business->updated_at }}</p>
        </div>

        <hr style="height:2px; width:100%; border-width:0; color:white; background-color:white">

        <!-- Batas Pembelian Field -->
        {{-- <div class="col-sm-12">
    {!! Form::label('batas_pembelian', 'Batas Pembelian:') !!}
    <p>{{ $business->batas_pembelian }}</p>
</div> --}}
    @endforeach
</div>
