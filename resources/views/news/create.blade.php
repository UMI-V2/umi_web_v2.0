@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Tambah Berita</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {{-- {!! Form::open(['route' => 'news.store']) !!} --}}

            <div class="card-body">

                <form action="{{ route('news.index') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="input" name="title" class="form-control" placeholder="Judul Berita">
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
                        <label>Penulis Berita</label>
                        <input type="input" name="author" class="form-control" placeholder="Penulis Berita">
                    </div>
                    
                    {{-- make radio button --}}
                    <div class="form-group">
                        <label>Apakah ini berita Utama?</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="is_headline" value="1">
                                Ya, Ini Berita Utama
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="is_headline" value="2">
                                Bukan, Ini Bukan Berita Utama
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Link Yang Bersangkutan Dengan Judul</label>
                        <input type="input" name="title_related_link" class="form-control" placeholder="Link Yang Bersangkutan Dengan Judul">
                    </div>
                    
                    <div class="form-group">
                        <label>Link Yang Bersangkutan</label>
                        <input type="input" name="related_link" class="form-control" placeholder="Link Yang Bersangkutan">
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
                        <a href="{{ route('news.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                </form>

                <div class="row">
                    {{-- @include('news.fields') --}}
                </div>

            </div>

            {{-- <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('news.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!} --}}

        </div>
    </div>
@endsection
