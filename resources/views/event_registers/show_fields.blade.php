<!-- Id Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $eventRegister->id }}</p>
</div> --}}

<!-- Event Id Field -->
<div class="col-sm-12">
    {!! Form::label('event_id', 'Nama Event:') !!}
    <p>{{ $eventRegister->events->title }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'Nama Penyelenggara:') !!}
    <p>{{ $eventRegister->users->name }}</p>
</div>

<!-- Jenis Kelamin Field -->
<div class="col-sm-12">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    <p>{{ $eventRegister->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'}}</p>
</div>

<!-- Tanggal Lahir Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    <p>{{ $eventRegister->tanggal_lahir }}</p>
</div>

<!-- Nomor HP Field -->
<div class="col-sm-12">
    {!! Form::label('no_hp', 'Nomor HP:') !!}
    <p>{{ $eventRegister->no_hp }}</p>
</div>

<!-- Foto Profil Field -->
<div class="col-sm-12">
    {!! Form::label('foto', 'Foto Profil:') !!}
    <p><img src="{{ $eventRegister->foto }}" width="100px" class="img-fluid mb-2" alt="white sample" style="border-radius: 25%"></p>
</div>

<!-- Asal Kota Field -->
<div class="col-sm-12">
    {!! Form::label('city', 'Asal Kota:') !!}
    <p>{{ $eventRegister->city }}</p>
</div>

<!-- Asal Desa Field -->
<div class="col-sm-12">
    {!! Form::label('subdistrict', 'Asal Desa:') !!}
    <p>{{ $eventRegister->subdistrict }}</p>
</div>

<!-- Alamat Lengkap Field -->
<div class="col-sm-12">
    {!! Form::label('full_address', 'Alamat Lengkap:') !!}
    <p>{{ $eventRegister->full_address }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $eventRegister->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $eventRegister->updated_at }}</p>
</div>

