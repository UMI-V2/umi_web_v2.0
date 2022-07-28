@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Tambah Daftar Event</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {{-- {!! Form::open(['route' => 'eventRegisters.store']) !!} --}}

            <div class="card-body">

                <form action="{{ route('eventRegisters.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="row">

                            <div class="form-group col-sm-6">
                                <label>Nama Event</label>
                                <select class="form-control" name="event_id">
                                    <option value="#" disabled selected>Pilih Event</option>
                                    @foreach ($events as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Nama Penyelenggara</label>
                                <select class="form-control" name="user_id">
                                    <option value="#" disabled selected>Pilih Penyelenggara</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Nama Pendaftar</label>
                                <input type="input" name="name" class="form-control" placeholder="Nama Pendaftar">
                            </div>
                            {{-- make radio button --}}
                            <div class="form-group col-sm-6">
                                <label>Jenis Kelamin</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="jenis_kelamin" value="L">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="jenis_kelamin" value="P">
                                        Perempuan
                                    </label>
                                </div>
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
                                <label for="foto">Foto Profil</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto" id="foto">
                                        <label class="custom-file-label" for="foto"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Asal Kota</label>
                                <input type="input" name="city" class="form-control" placeholder="Asal Kota">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Asal Desa</label>
                                <input type="input" name="subdistrict" class="form-control" placeholder="Asal Desa">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Alamat Lengkap</label>
                                <textarea name="full_address" class="form-control" placeholder="Alamat Lengkap"></textarea>
                            </div>

                            {{-- @include('users.fields') --}}
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('eventRegisters.index') }}" class="btn btn-default">Cancel</a>
                        </div>
                </form>

                <div class="row">
                    {{-- @include('event_registers.fields') --}}
                </div>

            </div>

            {{-- <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('eventRegisters.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!} --}}

        </div>
    </div>
@endsection
