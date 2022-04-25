<!-- Id Users Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_users', 'Id Users:') !!}
    {!! Form::select('id_users', $users, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Provinsi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_provinsi', 'Id Provinsi:') !!}
    {!! Form::select('id_provinsi', $master_provinces, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Kota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_kota', 'Id Kota:') !!}
    {!! Form::select('id_kota', $cities, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Kecamatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_kecamatan', 'Id Kecamatan:') !!}
    {!! Form::select('id_kecamatan', $sub_districts, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- No Hp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_hp', 'No Hp:') !!}
    {!! Form::text('no_hp', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Lengkap Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat_lengkap', 'Alamat Lengkap:') !!}
    {!! Form::textarea('alamat_lengkap', null, ['class' => 'form-control']) !!}
</div>

<!-- Patokan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('patokan', 'Patokan:') !!}
    {!! Form::textarea('patokan', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Is Alamat Utama Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_alamat_utama', 'Is Alamat Utama:') !!}
    {!! Form::hidden('is_alamat_utama', 0) !!}
    {!! Form::checkbox('is_alamat_utama', 1, null,  ['data-bootstrap-switch']) !!}
</div>


<!-- 'bootstrap / Toggle Switch Is Rumah Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_rumah', 'Is Rumah:') !!}
    {!! Form::hidden('is_rumah', 0) !!}
    {!! Form::checkbox('is_rumah', 1, null,  ['data-bootstrap-switch']) !!}
</div>


<!-- 'bootstrap / Toggle Switch Is Kantor Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_kantor', 'Is Kantor:') !!}
    {!! Form::hidden('is_kantor', 0) !!}
    {!! Form::checkbox('is_kantor', 1, null,  ['data-bootstrap-switch']) !!}
</div>


<!-- 'bootstrap / Toggle Switch Is Usaha Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_usaha', 'Is Usaha:') !!}
    {!! Form::hidden('is_usaha', 0) !!}
    {!! Form::checkbox('is_usaha', 1, null,  ['data-bootstrap-switch']) !!}
</div>


<!-- Latitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', 'Latitude:') !!}
    {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Longitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitude', 'Longitude:') !!}
    {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
</div>