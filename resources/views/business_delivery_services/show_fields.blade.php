{{-- <!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $businessDeliveryService->id }}</p>
</div> --}}

<div class="row">

    <!-- Id Usaha Field -->
    <div class="col-sm-12">
        {!! Form::label('id_usaha', 'Nama Lapak:') !!}
        <p>{{ $businessDeliveryService->businesses->nama_usaha }}</p>
    </div>

    <!-- Id Master Jasa Pengiriman Field -->
    <div class="col-sm-6">
        {!! Form::label('id_master_jasa_pengiriman', 'Nama Jasa Pengiriman:') !!}
        <p>{{ $businessDeliveryService->master_delivery_services->nama_jasa_pengiriman }}</p>
    </div>

    <!-- Biaya Field -->
    <div class="col-sm-6">
        {!! Form::label('biaya', 'Biaya:') !!}
        <p>{{ $businessDeliveryService->biaya }}</p>
    </div>

    <!-- Created At Field -->
    <div class="col-sm-6">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $businessDeliveryService->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="col-sm-6">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $businessDeliveryService->updated_at }}</p>
    </div>

</div>
