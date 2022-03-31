<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $businessPaymentMethod->id }}</p>
</div>

<!-- Id Usaha Field -->
<div class="col-sm-12">
    {!! Form::label('id_usaha', 'Id Usaha:') !!}
    <p>{{ $businessPaymentMethod->id_usaha }}</p>
</div>

<!-- Id Metode Pembayaran Field -->
<div class="col-sm-12">
    {!! Form::label('id_metode_pembayaran', 'Id Metode Pembayaran:') !!}
    <p>{{ $businessPaymentMethod->id_metode_pembayaran }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $businessPaymentMethod->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $businessPaymentMethod->updated_at }}</p>
</div>

