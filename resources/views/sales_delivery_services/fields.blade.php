<!-- Id Jasa Pengiriman Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_jasa_pengiriman', 'Id Jasa Pengiriman:') !!}
    {!! Form::select('id_jasa_pengiriman', $masterDeliveryServices, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Jenis Layanan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_layanan', 'Jenis Layanan:') !!}
    {!! Form::text('jenis_layanan', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Layanan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('deskripsi_layanan', 'Deskripsi Layanan:') !!}
    {!! Form::textarea('deskripsi_layanan', null, ['class' => 'form-control']) !!}
</div>

<!-- Ongkir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ongkir', 'Ongkir:') !!}
    {!! Form::text('ongkir', null, ['class' => 'form-control']) !!}
</div>