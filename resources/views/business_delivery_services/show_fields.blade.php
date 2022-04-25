<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $businessDeliveryService->id }}</p>
</div>

<!-- Id Usaha Field -->
<div class="col-sm-12">
    {!! Form::label('id_usaha', 'Id Usaha:') !!}
    <p>{{ $businessDeliveryService->id_usaha }}</p>
</div>

<!-- Id Master Jasa Pengiriman Field -->
<div class="col-sm-12">
    {!! Form::label('id_master_jasa_pengiriman', 'Id Master Jasa Pengiriman:') !!}
    <p>{{ $businessDeliveryService->id_master_jasa_pengiriman }}</p>
</div>

<!-- Biaya Field -->
<div class="col-sm-12">
    {!! Form::label('biaya', 'Biaya:') !!}
    <p>{{ $businessDeliveryService->biaya }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $businessDeliveryService->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $businessDeliveryService->updated_at }}</p>
</div>

