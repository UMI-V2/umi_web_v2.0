<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $masterDeliveryService->id }}</p>
</div>

<!-- Nama Jasa Pengiriman Field -->
<div class="col-sm-12">
    {!! Form::label('nama_jasa_pengiriman', 'Nama Jasa Pengiriman:') !!}
    <p>{{ $masterDeliveryService->nama_jasa_pengiriman }}</p>
</div>

<!-- Ongkir Field -->
<div class="col-sm-12">
    {!! Form::label('is_set_seller', 'Ongkir:') !!}
    <p>{{ $masterDeliveryService->is_set_seller }}</p>
</div>

<!-- Deskripsi Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{{ $masterDeliveryService->deskripsi }}</p>
</div>

<!-- Kode Rajaongkir Field -->
<div class="col-sm-12">
    {!! Form::label('kode_rajaongkir', 'Kode Rajaongkir:') !!}
    <p>{{ $masterDeliveryService->kode_rajaongkir }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $masterDeliveryService->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $masterDeliveryService->updated_at }}</p>
</div>

