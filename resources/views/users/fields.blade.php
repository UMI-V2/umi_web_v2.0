{{-- <!-- Name Field -->
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
</div> --}}

<div class="form-group col-sm-6">
    <label>Nama Lengkap</label>
    <input type="input" name="name" class="form-control" placeholder="Nama Pengguna">
</div>
<div class="form-group col-sm-6">
    <label>Email</label>
    <input type="email" name="email" class="form-control" placeholder="Alamat Email">
</div>
<div class="form-group col-sm-6">
    <label>Username</label>
    <input type="input" name="username" class="form-control" placeholder="Username Account">
</div>
<div class="form-group col-sm-6">
    <label>Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password">
</div>
<div class="form-group col-sm-6">
    <label>Nomor HP</label>
    <input type="input" name="no_hp" class="form-control" placeholder="Nomor HP">
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    {!! Form::text('tanggal_lahir', null, ['class' => 'form-control', 'id' => 'tanggal_lahir']) !!}
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

<div class="form-group col-sm-6">
    <label for="profile_photo_path">Foto Profil</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="profile_photo_path" id="profile_photo_path">
            <label class="custom-file-label" for="profile_photo_path"></label>
        </div>
    </div>
</div>

<div class="form-group col-sm-6">
    <label>Akses Sebagai</label>
    <select class="form-control" name="id_privilege">
        <option value="#" disabled selected>Pilih Hak Akses</option>
        @foreach ($master_privileges as $item)
            <option value="{{ $item->id }}">{{ $item->nama_hak_akses_pengguna }}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-6">
    <label>Status Akun</label>
    <select class="form-control" name="id_status_pengguna">
        <option value="#" disabled selected>Pilih Status</option>
        @foreach ($master_status_users as $item)
            <option value="{{ $item->id }}">{{ $item->nama_status_pengguna }}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    <label>Jenis Kelamin</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin"
            value="1">
        <label class="form-check-label" for="jenis_kelamin">
            Laki-laki
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin"
            value="0">
        <label class="form-check-label" for="jenis_kelamin">
            Perempuan
        </label>
    </div>
</div>