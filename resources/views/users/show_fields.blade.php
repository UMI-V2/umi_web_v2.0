<!-- Id Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $user->id }}</p>
</div> --}}

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Nama Pengguna:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Username Field -->
<div class="col-sm-12">
    {!! Form::label('username', 'Username:') !!}
    <p>{{ $user->username }}</p>
</div>

<!-- Jenis Kelamin Field -->
<div class="col-sm-12">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    <p>{{ $user->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'}}</p>
</div>

<!-- Tanggal Lahir Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    <p>{{ $user->tanggal_lahir }}</p>
</div>

<!-- No Hp Field -->
<div class="col-sm-12">
    {!! Form::label('no_hp', 'No Hp:') !!}
    <p>{{ $user->no_hp }}</p>
</div>

<!-- Foto Field -->
<div class="col-sm-12">
    {!! Form::label('foto', 'Foto:') !!}
    <p><img src="{{ $user->profile_photo_url }}" width="100px" class="img-fluid mb-2" alt="white sample" style="border-radius: 25%"></p>
</div>

{{-- <div class="row">
    @foreach ( $business->business_file as $file )
        <div class="col-sm-2">
        <a href="{{ $file->file }}" data-toggle="lightbox"
            data-title="sample 1 - white" data-gallery="gallery">
            <img src="{{ $file->file }}" class="img-fluid mb-2" alt="white sample">
        </a>
    </div>
    @endforeach
</div> --}}

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Password Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $user->password }}</p>
</div> --}}

<!-- Id Privilege Field -->
<div class="col-sm-12">
    {!! Form::label('id_privilege', 'Hak Akses:') !!}
    <p>{{ $user->id_privilege == '4' ? 'Pembeli' : 'Pengusaha UMKM' }}</p>
</div>

<!-- Id Status Pengguna Field -->
<div class="col-sm-12">
    {!! Form::label('id_status_pengguna', 'Status:') !!}
    <p>{{ $user->id_status_pengguna == '1' ? 'Aktif' : 'Tidak Aktif' }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $user->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $user->updated_at }}</p>
</div>

