<!-- Id User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_user', 'Id User:') !!}
    {!! Form::select('id_user', $users, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_usaha', 'Id Usaha:') !!}
    {!! Form::select('id_usaha', $businesses, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Metode Pembayaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_metode_pembayaran', 'Id Metode Pembayaran:') !!}
    {!! Form::select('id_metode_pembayaran', $business_payment_methods, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Sales Delivery Service Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_sales_delivery_service', 'Id Sales Delivery Service:') !!}
    {!! Form::select('id_sales_delivery_service', $sales_delivery_services, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- No Pemesanan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_pemesanan', 'No Pemesanan:') !!}
    {!! Form::text('no_pemesanan', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtotal Produk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal_produk', 'Subtotal Produk:') !!}
    {!! Form::text('subtotal_produk', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtotal Ongkir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal_ongkir', 'Subtotal Ongkir:') !!}
    {!! Form::text('subtotal_ongkir', null, ['class' => 'form-control']) !!}
</div>

<!-- Diskon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('diskon', 'Diskon:') !!}
    {!! Form::text('diskon', null, ['class' => 'form-control']) !!}
</div>

<!-- Biaya Penanganan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('biaya_penanganan', 'Biaya Penanganan:') !!}
    {!! Form::text('biaya_penanganan', null, ['class' => 'form-control']) !!}
</div>

<!-- Link Pembayaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('link_pembayaran', 'Link Pembayaran:') !!}
    {!! Form::text('link_pembayaran', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Pesanan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_pesanan', 'Total Pesanan:') !!}
    {!! Form::text('total_pesanan', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Is Ambil Di Toko Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_ambil_di_toko', 'Is Ambil Di Toko:') !!}
    {!! Form::hidden('is_ambil_di_toko', 0) !!}
    {!! Form::checkbox('is_ambil_di_toko', 1, null,  ['data-bootstrap-switch']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Is Rating Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_rating', 'Is Rating:') !!}
    {!! Form::hidden('is_rating', 0) !!}
    {!! Form::checkbox('is_rating', 1, null,  ['data-bootstrap-switch']) !!}
</div>
