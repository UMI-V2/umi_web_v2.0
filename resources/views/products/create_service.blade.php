@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Tambah Jasa</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {{-- {!! Form::open(['route' => 'products.store']) !!} --}}

            <div class="card-body">

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header" style="text-align: left">
                        <a href="{{ route('products.create') }}" class="btn btn-success"><< Klik disini untuk kembali ke menu barang</a>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Toko</label>
                            <select class="form-control" name="id_usaha">
                                <option value="#" disabled selected>Pilih Toko</option>
                                @foreach ($businesses as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_usaha }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Satuan Jasa</label>
                            <select class="form-control" name="id_satuan">
                                <option value="#" disabled selected>Pilih Satuan Jasa</option>
                                @foreach ($master_units as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_satuan }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        {{-- <div class="form-group">
                            <label>is_service</label> --}}
                            <input type="hidden" name="is_service" value="1" class="form-control">
                        {{-- </div> --}}
                        
                        <div class="form-group">
                            <label>Nama Jasa</label>
                            <input type="input" name="nama" class="form-control" placeholder="Nama Produk">
                        </div>
                        
                        <div class="form-group">
                            <label>Deskripsi Jasa</label>
                            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Produk"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Harga Jasa</label>
                            <input type="input" name="harga" class="form-control" placeholder="Harga Produk">
                        </div>
                        
                        {{--    --}}
                        

                        {{-- <div class="form-group">
                            <label>Kategori Produk</label>
                            <select class="form-control" name="id_kategori">
                                <option value="#" disabled selected>Pilih Kategori Produk</option>
                                @foreach ($master_categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
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
                    </div>
  
                    

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('products.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                </form>

                <div class="row">
                    {{-- @include('products.fields') --}}
                </div>

            </div>

            {{-- <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('products.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!} --}}

        </div>
    </div>
@endsection
