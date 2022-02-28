<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $masterPaymentMethod->id }}</p>
</div>

<!-- Nama Metode Pembayaran Field -->
<div class="col-sm-12">
    {!! Form::label('nama_metode_pembayaran', 'Nama Metode Pembayaran:') !!}
    <p>{{ $masterPaymentMethod->nama_metode_pembayaran }}</p>
</div>

<!-- Deskripsi Metode Pembayaran Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi_metode_pembayaran', 'Deskripsi Metode Pembayaran:') !!}
    <p>{{ $masterPaymentMethod->deskripsi_metode_pembayaran }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $masterPaymentMethod->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $masterPaymentMethod->updated_at }}</p>
</div>

