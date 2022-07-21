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

                <form action="{{ route('business_categories.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Pemilik Usaha</label>
                            <select class="form-control" name="id_user">
                                <option value="#" disabled selected>Pilih Pemilik Usaha</option>
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status Usaha</label>
                            <select class="form-control" name="id_master_status_usaha">
                                <option value="#" disabled selected>Pilih Status Usaha</option>
                                @foreach ($master_status_businesses as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_status_usaha }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label>Kategori Usaha</label>
                            <select class="form-control" name="id_master_kategori_usaha">
                                <option value="#" disabled selected>Pilih Kategori Usaha</option>
                                @foreach ($business_categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori_usaha }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label>Nama Usaha</label>
                            <input type="input" name="nama_usaha" class="form-control" placeholder="Nama Usaha">
                        </div>
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
  
                    <div class="row">
                        <!-- Senin Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('senin', 'Hari Senin') !!}
                        </div>
                        <div class="form-group col-sm-4">
                            {!! Form::text('senin_buka', null, ['class' => 'form-control', 'id' => 'senin_buka']) !!}
                        </div>
                        <div class="form-group col-sm-4">
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
                        <div class="form-group col-sm-4">
                            {!! Form::label('selasa', 'Hari Selasa') !!}
                        </div>
                        <div class="form-group col-sm-4">
                            {!! Form::text('selasa_buka', null, ['class' => 'form-control', 'id' => 'selasa_buka']) !!}
                        </div>
                        <div class="form-group col-sm-4">
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
                        <div class="form-group col-sm-4">
                            {!! Form::label('rabu', 'Hari Rabu') !!}
                        </div>
                        <div class="form-group col-sm-4">
                            {!! Form::text('rabu_buka', null, ['class' => 'form-control', 'id' => 'rabu_buka']) !!}
                        </div>
                        <div class="form-group col-sm-4">
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
                        <div class="form-group col-sm-4">
                            {!! Form::label('kamis', 'Hari Kamis') !!}
                        </div>
                        <div class="form-group col-sm-4">
                            {!! Form::text('kamis_buka', null, ['class' => 'form-control', 'id' => 'kamis_buka']) !!}
                        </div>
                        <div class="form-group col-sm-4">
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
                        <div class="form-group col-sm-4">
                            {!! Form::label('jumat', 'Hari Jumat') !!}
                        </div>
                        <div class="form-group col-sm-4">
                            {!! Form::text('jumat_buka', null, ['class' => 'form-control', 'id' => 'jumat_buka']) !!}
                        </div>
                        <div class="form-group col-sm-4">
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
                        <div class="form-group col-sm-4">
                            {!! Form::label('sabtu', 'Hari Sabtu') !!}
                        </div>
                        <div class="form-group col-sm-4">
                            {!! Form::text('sabtu_buka', null, ['class' => 'form-control', 'id' => 'sabtu_buka']) !!}
                        </div>
                        <div class="form-group col-sm-4">
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
                        <div class="form-group col-sm-4">
                            {!! Form::label('minggu', 'Hari Minggu') !!}
                        </div>
                        <div class="form-group col-sm-4">
                            {!! Form::text('minggu_buka', null, ['class' => 'form-control', 'id' => 'minggu_buka']) !!}
                        </div>
                        <div class="form-group col-sm-4">
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
                        <a href="{{ route('businessFiles.index') }}" class="btn btn-default">Cancel</a>
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
