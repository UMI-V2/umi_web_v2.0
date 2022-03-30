<!-- Id Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_usaha', 'Id Usaha:') !!}
    {!! Form::select('id_usaha', $businesses, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Master Jasa Pengiriman Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_master_jasa_pengiriman', 'Id Master Jasa Pengiriman:') !!}
    {!! Form::select('id_master_jasa_pengiriman', $master_delivery_services, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Biaya Field -->
<div class="form-group col-sm-6">
    {!! Form::label('biaya', 'Biaya:') !!}
    {!! Form::text('biaya', null, ['class' => 'form-control']) !!}
</div>