@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Tambah Pengumuman</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {{-- {!! Form::open(['route' => 'announcements.store']) !!} --}}

            <div class="card-body">

                <form action="{{ route('announcements.index') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Judul Pengumuman</label>
                        <input type="input" name="title" class="form-control" placeholder="Judul Pengumuman">
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

                    

                    <div class="form-group">
                        <label for="exampleInputFile">Masukan File</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="file[]" multiple="multiple" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Pilih Foto Pengumuman</label>
                            </div>
                            {{-- <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div> --}}
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('announcements.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                </form>

                <div class="row">
                    {{-- @include('announcements.fields') --}}
                </div>

            </div>

            {{-- <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('announcements.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!} --}}

        </div>
    </div>
@endsection
