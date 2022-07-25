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

                    <div class="form-group">
                        <label>Judul Event</label>
                        <input type="input" name="title" class="form-control" placeholder="Judul Event">
                    </div>

                    <div class="form-group">
                        <label>Sub Judul</label>
                        <input type="input" name="sub_title" class="form-control" placeholder="Sub Judul">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" placeholder="Deskripsi"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Author</label>
                        <input type="input" name="author" class="form-control" placeholder="Author">
                    </div>

                    <!-- Start Time Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('start_time', 'Start Time:') !!}
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
                        {!! Form::label('end_time', 'End Time:') !!}
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

                    <div class="form-group">
                        <label>Contact Person</label>
                        <input type="input" name="contact_person" class="form-control" placeholder="Contact Person">
                    </div>

                    <div class="form-group">
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

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('events.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                </form>

            <div class="row">
                {{-- @include('events.fields') --}}
            </div>

        </div>

        {{-- <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('events.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!} --}}

    </div>
    </div>
@endsection
