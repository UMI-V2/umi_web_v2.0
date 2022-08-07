<!-- Status Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}    
</div> --}}
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['pending' => 'pending', 'onprogress' => 'onprogress', 'success' => 'success', 'failed' => 'failed'], null, ['class' => 'form-control custom-select']) !!}
</div>

<div class="form-group col-sm-12">
</div>

<!-- Id User Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('id_user', 'Id User:') !!}
    {!! Form::select('id_user', $users, null, ['class' => 'form-control custom-select' , 'disabled' => 'true']) !!}
</div> --}}
<div class="form-group col-sm-6">
    {!! Form::label('id_user', 'Nama Pemilik Usaha:') !!}
    {!! Form::text('id_user', null, ['class' => 'form-control' , 'readonly' => 'true']) !!}
</div>

<!-- Id Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_usaha', 'Id Usaha:') !!}
    {!! Form::text('id_usaha', null, ['class' => 'form-control' , 'readonly' => 'true']) !!}
</div>

<!-- Id Bank Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_bank', 'Id Bank:') !!}
    {!! Form::text('id_bank', null, ['class' => 'form-control' , 'readonly' => 'true']) !!}
</div>

<!-- Nominal Request Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nominal_request', 'Nominal Request:') !!}
    {!! Form::text('nominal_request', null, ['class' => 'form-control' , 'readonly' => 'true']) !!}
</div>

<!-- No Rek Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_rek', 'No Rek:') !!}
    {!! Form::text('no_rek', null, ['class' => 'form-control' , 'readonly' => 'true']) !!}
</div>

<!-- Rek Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rek_name', 'Rek Name:') !!}
    {!! Form::text('rek_name', null, ['class' => 'form-control' , 'readonly' => 'true']) !!}
</div>

<!-- Bank Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_name', 'Bank Name:') !!}
    {!! Form::text('bank_name', null, ['class' => 'form-control' , 'readonly' => 'true']) !!}
</div>

<!-- Cost Admin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cost_admin', 'Cost Admin:') !!}
    {!! Form::text('cost_admin', null, ['class' => 'form-control' , 'readonly' => 'true']) !!}
</div>

<!-- Total Withdraw Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_withdraw', 'Total Withdraw:') !!}
    {!! Form::text('total_withdraw', null, ['class' => 'form-control' , 'readonly' => 'true']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-6" readonly>
    {!! Form::label('note', 'Note:') !!}
    {!! Form::text('note', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>