@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Tambah Event</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {{-- {!! Form::open(['route' => 'events.store']) !!} --}}

            <div class="card-body">


                <form action="{{ route('events.index') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Judul Event</label>
                            <input type="input" name="title" class="form-control" placeholder="Judul Event">
                        </div>

                        <div class="form-group col-sm-6">
                            <label>Sub Judul</label>
                            <input type="input" name="sub_title" class="form-control" placeholder="Sub Judul">
                        </div>

                        <div class="form-group col-sm-6">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control" placeholder="Deskripsi"></textarea>
                        </div>

                        <div class="form-group col-sm-6">
                            <label>Author</label>
                            <input type="input" name="author" class="form-control" placeholder="Author">
                        </div>

                        <!-- Start Time Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('start_time', 'Waktu Event Dimulai') !!}
                            {!! Form::text('start_time', null, ['class' => 'form-control', 'id' => 'start_time']) !!}
                        </div>

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#start_time').datetimepicker({
                                    format: 'YYYY-MM-DD HH:mm:ss',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

                        <!-- End Time Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('end_time', 'Waktu Event Selesai') !!}
                            {!! Form::text('end_time', null, ['class' => 'form-control', 'id' => 'end_time']) !!}
                        </div>

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#end_time').datetimepicker({
                                    format: 'YYYY-MM-DD HH:mm:ss',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

                        <!-- Registration Deadline Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('registration_deadline', 'Batas Waktu Pendaftaran') !!}
                            {!! Form::text('registration_deadline', null, ['class' => 'form-control', 'id' => 'registration_deadline']) !!}
                        </div>

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#registration_deadline').datetimepicker({
                                    format: 'YYYY-MM-DD HH:mm:ss',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

                        <div class="form-group col-sm-6">
                            <label>Pendaftaran Maksimal</label>
                            <input type="number" name="max_registers" class="form-control"
                                placeholder="Pendaftaran Maksimal">
                        </div>
                        
                        <div class="form-group col-sm-6">
                            <label>Kontak Person</label>
                            <input type="input" name="contact_person" class="form-control" placeholder="Contact Person">
                        </div>
                        
                        <div class="form-group col-sm-6">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file[]" multiple="multiple" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Pilih Foto Event</label>
                                </div>
                                {{-- <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div> --}}
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Lokasi Event</label>
                                <textarea class="form-control" rows="3" name="address" placeholder="Masukan Alamat Tempat Event Diselenggarakan Disini..." style="height: 85px;"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('events.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                </form>


                {{-- @include('events.fields') --}}

            </div>

            {{-- <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('events.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!} --}}

        </div>
    </div>
@endsection
