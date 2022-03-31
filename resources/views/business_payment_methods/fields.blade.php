<!-- Id Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_usaha', 'Id Usaha:') !!}
    {!! Form::select('id_usaha', $businesses, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Metode Pembayaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_metode_pembayaran', 'Id Metode Pembayaran:') !!}
    {!! Form::select('id_metode_pembayaran', $masterPaymentMethods, null, ['class' => 'form-control custom-select']) !!}
</div>
