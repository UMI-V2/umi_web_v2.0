<!-- Nama Jasa Pengiriman Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_jasa_pengiriman', 'Nama Jasa Pengiriman:') !!}
    {!! Form::text('nama_jasa_pengiriman', null, ['class' => 'form-control']) !!}
</div>

<!-- Ongkir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ongkir', 'Ongkir:') !!}
    {!! Form::select('ongkir', ['Ongkir ditentukan oleh RajaOngkir' => 'Ongkir ditentukan oleh RajaOngkir', ' Ongkir ditentukan oleh Penjual' => ' Ongkir ditentukan oleh Penjual'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Deskripsi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::text('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Kode Rajaongkir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_rajaongkir', 'Kode Rajaongkir:') !!}
    {!! Form::text('kode_rajaongkir', null, ['class' => 'form-control']) !!}
</div>