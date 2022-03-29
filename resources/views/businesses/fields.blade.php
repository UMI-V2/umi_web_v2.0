<!-- Id User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_user', 'Id User:') !!}
    {!! Form::select('id_user', $users, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Master Status Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_master_status_usaha', 'Id Master Status Usaha:') !!}
    {!! Form::select('id_master_status_usaha', $master_status_businesses, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Nama Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_usaha', 'Nama Usaha:') !!}
    {!! Form::text('nama_usaha', null, ['class' => 'form-control']) !!}
</div>