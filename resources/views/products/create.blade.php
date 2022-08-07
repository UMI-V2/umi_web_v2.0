@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Tambah Barang</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {{-- {!! Form::open(['route' => 'products.store']) !!} --}}

            {{-- <div class="card-body">

                <div class="row"> --}}

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header" style="text-align: right">
                            <a href="{{ route('products.create_service') }}" class="btn btn-danger">Klik disini apabila anda
                                ingin manambahkan jasa >></a>
                        </div>

                        <div class="card-body">
                            <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Nama Toko</label>
                                <select class="form-control" name="id_usaha">
                                    <option value="#" disabled selected>Pilih Toko</option>
                                    @foreach ($businesses as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_usaha }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Satuan Barang</label>
                                <select class="form-control" name="id_satuan">
                                    <option value="#" disabled selected>Pilih Satuan Barang</option>
                                    @foreach ($master_units as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_satuan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- <div class="form-group col-sm-6">
                            <label>is_service</label> --}}
                            <input type="hidden" name="is_service" value="0" class="form-control">
                            {{-- </div> --}}

                            <div class="form-group col-sm-6">
                                <label>Nama Barang</label>
                                <input type="input" name="nama" class="form-control" placeholder="Nama Barang">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Deskripsi Barang</label>
                                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Barang"></textarea>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Harga Barang</label>
                                <input type="input" name="harga" class="form-control" placeholder="Harga Barang">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Stok Barang</label>
                                <input type="input" name="stok" class="form-control" placeholder="Stok Barang">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Jumlah Satuan</label>
                                <input type="number" name="jumlah_satuan" class="form-control" placeholder="Jumlah Satuan">
                            </div>

                            <div class="form-group col-sm-6">
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

                            <div class="form-group col-sm-6">
                                <label>Kondisi Barang</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kondisi" id="kondisi"
                                        value="1">
                                    <label class="form-check-label" for="kondisi">
                                        Baru
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kondisi" id="kondisi"
                                        value="0">
                                    <label class="form-check-label" for="kondisi">
                                        Bekas
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Preorder?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="preorder" id="preorder"
                                        value="1">
                                    <label class="form-check-label" for="preorder">
                                        Ya, Barang ini dapat di preorder
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="preorder" id="preorder"
                                        value="0">
                                    <label class="form-check-label" for="preorder">
                                        Tidak, Barang ini tidak dapat di preorder
                                    </label>
                                </div>
                            </div>


                            {{-- <div class="form-group col-sm-6">
                            <label>Kategori Barang</label>
                            <select class="form-control" name="id_kategori">
                                <option value="#" disabled selected>Pilih Kategori Barang</option>
                                @foreach ($master_categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        </div>



                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('products.index') }}" class="btn btn-default">Cancel</a>
                        </div>
                    </form>


                    {{-- @include('products.fields') --}}
                {{-- </div>

            </div> --}}

            {{-- <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('products.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!} --}}

        </div>
    </div>
@endsection
