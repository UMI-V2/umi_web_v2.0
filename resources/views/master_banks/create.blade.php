@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Master Bank</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {{-- {!! Form::open(['route' => 'masterBanks.store']) !!} --}}
            <form action="{{ route('masterBanks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

            <div class="card-body">

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Nama Bank</label>
                        <input type="input" name="name" class="form-control" placeholder="Nama Bank">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Deskripsi Bank</label>
                        <input type="input" name="description" class="form-control" placeholder="Deskripsi Bank">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Biaya Admin</label>
                        <input type="input" name="cost_admin" class="form-control" placeholder="Biaya Admin">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="logo">Logo Bank</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="logo" id="logo">
                                <label class="custom-file-label" for="logo"></label>
                            </div>
                        </div>
                    </div>
                    {{-- @include('master_banks.fields') --}}
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('masterBanks.index') }}" class="btn btn-default">Cancel</a>
            </div>

            </form>

            {{-- <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('masterBanks.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!} --}}

        </div>
    </div>
@endsection
