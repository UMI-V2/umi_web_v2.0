@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Tambah Pengguna</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {{-- {!! Form::open(['route' => 'users.store', 'files' => true]) !!} --}}

            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="row">

                    {{-- <div class="form-group col-sm-6">
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
                    </div> --}}

                    
                        @include('users.fields')
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
                    </div>
            </form>
        </div>

        {{-- <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!} --}}

    </div>
    </div>
@endsection

@push('tampil_foto_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#profile_photo_path').on('change', function () {
                //get the file name
                var fileName = $(this).val().split('\\').pop();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            });
        });
    </script>
@endpush