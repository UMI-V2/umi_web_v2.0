<!-- Id Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $business->id }}</p>
</div> --}}

<div class="row">

    <!-- Nama Usaha Field -->
    <div class="col-sm-6">
        {!! Form::label('nama_usaha', 'Nama Usaha:') !!}
        <p>{{ $business->nama_usaha }}</p>
    </div>

    <!-- Id User Field -->
    <div class="col-sm-6">
        {!! Form::label('id_user', 'Nama Pemilik:') !!}
        <p>{{ $business->users->name }}</p>
    </div>

    <!-- Apakah Produk Dapat Diambil Langsung di Toko? Field -->
    <div class="col-sm-6">
        {!! Form::label('is_ambil_di_toko', 'Apakah Produk Dapat Diambil Langsung di Toko?:') !!}
        <p>{{ $business->is_ambil_di_toko == '1' ? 'Ya' : 'Tidak'}}</p>
    </div>

    <!-- Apakah Pembayaran Dilakukan Secara Elektronik Field -->
    <div class="col-sm-6">
        {!! Form::label('is_auto_payment', 'Apakah Pembayaran Dilakukan Secara Elektronik:') !!}
        <p>{{ $business->is_auto_payment == '1' ? 'Ya' : 'Tidak'}}</p>
    </div>
    
    <!-- Apakah Pembayaran Dilakukan Secara Manual Field -->
    <div class="col-sm-6">
        {!! Form::label('is_manual_payment', 'Apakah Pembayaran Dilakukan Secara Manual:') !!}
        <p>{{ $business->is_manual_payment == '1' ? 'Ya' : 'Tidak'}}</p>
    </div>

    <!-- Apakah Lapak Menyediakan Pengiriman? Field -->
    <div class="col-sm-6">
        {!! Form::label('is_delivery', 'Apakah Lapak Menyediakan Pengiriman?:') !!}
        <p>{{ $business->is_delivery == '1' ? 'Ya' : 'Tidak'}}</p>
    </div>

    <!-- Id Master Status Usaha Field -->
    <div class="col-sm-6">
        {!! Form::label('id_master_status_usaha', 'Status Usaha:') !!}
        <p>{{ $business->masterStatusBusinesses->nama_status_usaha }}</p>
    </div>

    <!-- Deskripsi Field -->
    <div class="col-sm-6">
        {!! Form::label('deskripsi', 'Deskripsi:') !!}
        <p>{{ $business->deskripsi }}</p>
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

</div>
