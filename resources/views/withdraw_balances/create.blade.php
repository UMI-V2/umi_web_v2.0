@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Withdraw Balance</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {{-- {!! Form::open(['route' => 'withdrawBalances.store']) !!} --}}

            <div class="card-body">


                    <form action="{{ route('withdrawBalances.index') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Pemilik Usaha</label>
                                <select class="form-control" name="id_user">
                                    <option value="#" disabled selected>Pilih Pemilik Usaha</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Nama Usaha</label>
                                <select class="form-control" name="id_usaha">
                                    <option value="#" disabled selected>Pilih Usaha</option>
                                    @foreach ($businesses as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_usaha }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Nama Bank</label>
                                <select class="form-control" name="id_bank">
                                    <option value="#" disabled selected>Pilih Bank</option>
                                    @foreach ($master_banks as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- add currency form --}}
                            <div class="form-group col-sm-6">
                                <label>Nominal</label>
                                <input type="number" name="nominal_request" class="form-control" placeholder="Nominal">
                            </div>

                            {{-- add no_rek --}}
                            <div class="form-group col-sm-6">
                                <label>No Rekening</label>
                                <input type="number" name="no_rek" class="form-control" placeholder="No Rekening">
                            </div>

                            {{-- add rek_name --}}
                            <div class="form-group col-sm-6">
                                <label>Atas Nama</label>
                                <input type="input" name="rek_name" class="form-control" placeholder="Atas Nama">
                            </div>

                            {{-- add bank_name --}}
                            <div class="form-group col-sm-6">
                                <label>Nama Bank</label>
                                <input type="input" name="bank_name" class="form-control" placeholder="Nama Bank">
                            </div>

                            {{-- add cost_admin --}}
                            <div class="form-group col-sm-6">
                                <label>Biaya Admin</label>
                                <input type="number" name="cost_admin" class="form-control" placeholder="Biaya Admin">
                            </div>

                            {{-- add total_withdraw --}}
                            <div class="form-group col-sm-6">
                                <label>Total Withdraw</label>
                                <input type="number" name="total_withdraw" class="form-control" placeholder="Total Withdraw">
                            </div>

                            {{-- add status --}}
                            <div class="form-group col-sm-6">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="#" disabled selected>Pilih Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="onprogress">On Progress</option>
                                    <option value="success">Success</option>
                                    <option value="failed">Failed</option>
                                </select>
                            </div>

                            {{-- add note --}}
                            <div class="form-group col-sm-6">
                                <label>Note</label>
                                <input type="input" name="note" class="form-control" placeholder="Note">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('withdrawBalances.index') }}" class="btn btn-default">Cancel</a>
                        </div>
                    </form>

                    {{-- @include('withdraw_balances.fields') --}}

            </div>

            {{-- <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('withdrawBalances.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!} --}}

        </div>
    </div>
@endsection
