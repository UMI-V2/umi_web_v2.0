@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Tambah Usaha</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {{-- {!! Form::open(['route' => 'businesses.store']) !!} --}}

            <div class="card-body">

                <form action="{{ route('businesses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label>Pemilik Usaha</label>
                                <select class="form-control" name="id_user">
                                    <option value="#" disabled selected>Pilih Pemilik Usaha</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Status Usaha</label>
                                <select class="form-control" name="id_master_status_usaha">
                                    <option value="#" disabled selected>Pilih Status Usaha</option>
                                    @foreach ($master_status_businesses as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_status_usaha }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- how to get nama_kategori_usaha from model BusinessCategory --}}
                            <div class="form-group col-sm-4">
                                <label>Kategori Usaha</label>
                                <select class="form-control" name="id_master_kategori_usaha">
                                    <option value="#" disabled selected>Pilih Kategori Usaha</option>
                                    @foreach ($master_business_categories as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama_kategori_usaha . ($item->status_kategori_usaha == '0' ? ' - (Barang)' : ' - (Jasa)') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group col-sm-4">
                            <label>Kategori Usaha</label>
                            <select class="form-control" name="id_kategori">
                                <option value="#" disabled selected>Pilih Kategori Usaha</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori_usaha }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                            <div class="form-group col-sm-4">
                                <label>Nama Usaha</label>
                                <input type="input" name="nama_usaha" class="form-control" placeholder="Nama Usaha">
                            </div>
                            <div class="form-group col-sm-4">
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
                            <div class="form-group col-sm-4">
                                <label>Deskripsi Usaha</label>
                                <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                            </div>
                            {{-- make a radio --}}
                            <div class="form-group col-sm-4">
                                <label>Apakah produk dapat diambil langsung di toko?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_ambil_di_toko"
                                        id="exampleRadios1" value="1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Ya, Produk dapat diambil langsung di toko
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_ambil_di_toko"
                                        id="exampleRadios2" value="0">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Tidak, Produk tidak dapat diambil langsung di toko
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Apakah lapak menyediakan fitur pembayaran otomatis?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_auto_payment"
                                        id="exampleRadios1" value="1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_manual_payment"
                                        id="exampleRadios2" value="1">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Apakah lapak menyediakan jasa antar produk?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_delivery" id="exampleRadios1"
                                        value="1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_delivery" id="exampleRadios2"
                                        value="0">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr style="height:2px; width:100%; border-width:0; color:white; background-color:white">
                    
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <h1>Jam Buka Usaha</h1>
                                </div>
                            </div>
                        </div>
                    </section>

                    <hr style="height:2px; width:100%; border-width:0; color:white; background-color:white">

                    <div class="row">
                        <!-- Senin Field -->
                        <div class="form-group col-sm-2">
                            {!! Form::label('senin', 'Hari Senin') !!}
                        </div>
                        <div class="form-group col-sm-2">
                            {!! Form::text('senin_buka', null, ['class' => 'form-control', 'id' => 'senin_buka']) !!}
                        </div>
                        <div class="form-group col-sm-2">
                            <!-- {!! Form::label('senin', 'Senin:') !!} -->
                            {!! Form::text('senin_tutup', null, ['class' => 'form-control', 'id' => 'senin_tutup']) !!}
                        </div>

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#senin_buka').datetimepicker({
                                    format: 'HH:mm',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#senin_tutup').datetimepicker({
                                    format: 'HH:mm',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush
                        <!-- Selasa Field -->
                        <div class="form-group col-sm-2">
                            {!! Form::label('selasa', 'Hari Selasa') !!}
                        </div>
                        <div class="form-group col-sm-2">
                            {!! Form::text('selasa_buka', null, ['class' => 'form-control', 'id' => 'selasa_buka']) !!}
                        </div>
                        <div class="form-group col-sm-2">
                            {!! Form::text('selasa_tutup', null, ['class' => 'form-control', 'id' => 'selasa_tutup']) !!}
                        </div>

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#selasa_buka').datetimepicker({
                                    format: 'HH:mm',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#selasa_tutup').datetimepicker({
                                    format: 'HH:mm',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

                        <!-- Rabu Field -->
                        <div class="form-group col-sm-2">
                            {!! Form::label('rabu', 'Hari Rabu') !!}
                        </div>
                        <div class="form-group col-sm-2">
                            {!! Form::text('rabu_buka', null, ['class' => 'form-control', 'id' => 'rabu_buka']) !!}
                        </div>
                        <div class="form-group col-sm-2">
                            {!! Form::text('rabu_tutup', null, ['class' => 'form-control', 'id' => 'rabu_tutup']) !!}
                        </div>

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#rabu_buka').datetimepicker({
                                    format: 'HH:mm',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#rabu_tutup').datetimepicker({
                                    format: 'HH:mm',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

                        <!-- Kamis Field -->
                        <div class="form-group col-sm-2">
                            {!! Form::label('kamis', 'Hari Kamis') !!}
                        </div>
                        <div class="form-group col-sm-2">
                            {!! Form::text('kamis_buka', null, ['class' => 'form-control', 'id' => 'kamis_buka']) !!}
                        </div>
                        <div class="form-group col-sm-2">
                            {!! Form::text('kamis_tutup', null, ['class' => 'form-control', 'id' => 'kamis_tutup']) !!}
                        </div>

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#kamis_buka').datetimepicker({
                                    format: 'HH:mm',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#kamis_tutup').datetimepicker({
                                    format: 'HH:mm',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

                        <!-- Jumat Field -->
                        <div class="form-group col-sm-2">
                            {!! Form::label('jumat', 'Hari Jumat') !!}
                        </div>
                        <div class="form-group col-sm-2">
                            {!! Form::text('jumat_buka', null, ['class' => 'form-control', 'id' => 'jumat_buka']) !!}
                        </div>
                        <div class="form-group col-sm-2">
                            {!! Form::text('jumat_tutup', null, ['class' => 'form-control', 'id' => 'jumat_tutup']) !!}
                        </div>

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#jumat_buka').datetimepicker({
                                    format: 'HH:mm',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#jumat_tutup').datetimepicker({
                                    format: 'HH:mm',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

                        <!-- Sabtu Field -->
                        <div class="form-group col-sm-2">
                            {!! Form::label('sabtu', 'Hari Sabtu') !!}
                        </div>
                        <div class="form-group col-sm-2">
                            {!! Form::text('sabtu_buka', null, ['class' => 'form-control', 'id' => 'sabtu_buka']) !!}
                        </div>
                        <div class="form-group col-sm-2">
                            {!! Form::text('sabtu_tutup', null, ['class' => 'form-control', 'id' => 'sabtu_tutup']) !!}
                        </div>

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#sabtu_buka').datetimepicker({
                                    format: 'HH:mm',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#sabtu_tutup').datetimepicker({
                                    format: 'HH:mm',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

                        <!-- Minggu Field -->
                        <div class="form-group col-sm-2">
                            {!! Form::label('minggu', 'Hari Minggu') !!}
                        </div>
                        <div class="form-group col-sm-5">
                            {!! Form::text('minggu_buka', null, ['class' => 'form-control', 'id' => 'minggu_buka']) !!}
                        </div>
                        <div class="form-group col-sm-5">
                            {!! Form::text('minggu_tutup', null, ['class' => 'form-control', 'id' => 'minggu_tutup']) !!}
                        </div>

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#minggu_buka').datetimepicker({
                                    format: 'HH:mm',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush

                        @push('page_scripts')
                            <script type="text/javascript">
                                $('#minggu_tutup').datetimepicker({
                                    format: 'HH:mm',
                                    useCurrent: true,
                                    sideBySide: true
                                })
                            </script>
                        @endpush
                        {{-- @include('businesses.fields') --}}
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('businesses.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                </form>

            </div>

            {{-- <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('businesses.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!} --}}

        </div>
    </div>
@endsection
