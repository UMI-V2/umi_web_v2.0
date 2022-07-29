<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-12">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin', ['class' => 'form-check-label']) !!}
    <label class="form-check">
    {!! Form::radio('jenis_kelamin', "L", null, ['class' => 'form-check-input']) !!} Laki-laki
</label>

<label class="form-check">
    {!! Form::radio('jenis_kelamin', "P", null, ['class' => 'form-check-input']) !!} Perempuan
</label>

</div>


<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    {!! Form::text('tanggal_lahir', null, ['class' => 'form-control','id'=>'tanggal_lahir']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal_lahir').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- No Hp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_hp', 'No Hp:') !!}
    {!! Form::text('no_hp', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('profile_photo_path', 'Foto:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('profile_photo_path', ['class' => 'custom-file-input']) !!}
            {!! Form::label('profile_photo_path', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Id Privilege Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_privilege', 'Id Privilege:') !!}
    {!! Form::select('id_privilege', $master_privileges, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Status Pengguna Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_status_pengguna', 'Id Status Pengguna:') !!}
    {!! Form::select('id_status_pengguna', $master_status_users, null, ['class' => 'form-control custom-select']) !!}
</div>
