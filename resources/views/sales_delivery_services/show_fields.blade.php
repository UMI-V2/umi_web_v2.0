<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $salesDeliveryService->id }}</p>
</div>

<!-- Id Jasa Pengiriman Field -->
<div class="col-sm-12">
    {!! Form::label('id_jasa_pengiriman', 'Id Jasa Pengiriman:') !!}
    <p>{{ $salesDeliveryService->id_jasa_pengiriman }}</p>
</div>

<!-- Jenis Layanan Field -->
<div class="col-sm-12">
    {!! Form::label('jenis_layanan', 'Jenis Layanan:') !!}
    <p>{{ $salesDeliveryService->jenis_layanan }}</p>
</div>

<!-- Deskripsi Layanan Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi_layanan', 'Deskripsi Layanan:') !!}
    <p>{{ $salesDeliveryService->deskripsi_layanan }}</p>
</div>

<!-- Ongkir Field -->
<div class="col-sm-12">
    {!! Form::label('ongkir', 'Ongkir:') !!}
    <p>{{ $salesDeliveryService->ongkir }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $salesDeliveryService->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $salesDeliveryService->updated_at }}</p>
</div>

