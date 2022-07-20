@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Ubah File Usaha</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {{-- {!! Form::model($businessFile, ['route' => ['businessFiles.update', $businessFile->id], 'method' => 'patch', 'files' => true]) !!} --}}

            <div class="card-body">
                <form action="{{ route('business_files.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        {{-- <div class="form-group">
                            <label>Select</label>
                            <select class="form-control" name="id_usaha">
                                <option value="#" disabled selected>Pilih Jenis Usaha</option>
                                @foreach ($businesses as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_usaha }}</option>
                                @endforeach
                            </select>
                            </div> --}}
                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div> --}}
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file[]" multiple="multiple" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                {{-- <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div> --}}
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="is_video" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" name="is_video" for="exampleCheck1">Apakah menggunakan video?</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="is_photo" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" name="is_photo" for="exampleCheck1">Apakah menggunakan photo?</label>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('businessFiles.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                </form>


                <div class="row">
                    {{-- @include('business_files.fields') --}}
                </div>
            </div>

            {{-- <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('businessFiles.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!} --}}

        </div>
    </div>
@endsection
