<div class="row">

    <!-- Id Field -->
    {{-- <div class="col-sm-6">
        {!! Form::label('id', 'Id:') !!}
        <p>{{ $withdrawBalance->id }}</p>
    </div> --}}

    <!-- Id User Field -->
    <div class="col-sm-6">
        {!! Form::label('id_user', 'Nama Penarik:') !!}
        <p>{{ $withdrawBalance->users->name }}</p>
    </div>

    <!-- Id Usaha Field -->
    <div class="col-sm-6">
        {!! Form::label('id_usaha', 'Nama Lapak:') !!}
        <p>{{ $withdrawBalance->businesses->nama_usaha }}</p>
    </div>

    <!-- Id Bank Field -->
    <div class="col-sm-6">
        {!! Form::label('id_bank', 'Nama Bank:') !!}
        <p>{{ $withdrawBalance->master_banks->name }}</p>
    </div>

    <!-- Nominal Request Field -->
    <div class="col-sm-6">
        {!! Form::label('nominal_request', 'Nominal Request:') !!}
        <p>{{ $withdrawBalance->nominal_request == '0' ? 'Invalid Request' :  "Rp. ".number_format($withdrawBalance->nominal_request, 0, ',', '.') }}</p>
    </div>

    <!-- No Rek Field -->
    <div class="col-sm-6">
        {!! Form::label('no_rek', 'Atas Nama:') !!}
        <p>{{ $withdrawBalance->no_rek }}</p>
    </div>

    <!-- Rek Name Field -->
    <div class="col-sm-6">
        {!! Form::label('rek_name', 'Rek Name:') !!}
        <p>{{ $withdrawBalance->rek_name }}</p>
    </div>

    {{-- <!-- Bank Name Field -->
    <div class="col-sm-6">
        {!! Form::label('bank_name', 'Bank Name:') !!}
        <p>{{ $withdrawBalance->bank_name }}</p>
    </div> --}}

    <!-- Cost Admin Field -->
    <div class="col-sm-6">
        {!! Form::label('cost_admin', 'Cost Admin:') !!}
        <p>{{ $withdrawBalance->cost_admin == '0' ? 'Invalid Request' :  "Rp. ".number_format($withdrawBalance->cost_admin, 0, ',', '.') }}</p>
    </div>

    <!-- Total Withdraw Field -->
    <div class="col-sm-6">
        {!! Form::label('total_withdraw', 'Total Withdraw:') !!}
        <p>{{ $withdrawBalance->total_withdraw == '0' ? 'Invalid Request' :  "Rp. ".number_format($withdrawBalance->total_withdraw, 0, ',', '.') }}</p>
    </div>

    <!-- Status Field -->
    <div class="col-sm-6">
        {!! Form::label('status', 'Status:') !!}
        <p>{{ $withdrawBalance->status }}</p>
    </div>

    <!-- Note Field -->
    <div class="col-sm-6">
        {!! Form::label('note', 'Catatan:') !!}
        <p>{{ $withdrawBalance->note }}</p>
    </div>

    <!-- Created At Field -->
    <div class="col-sm-6">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{{ $withdrawBalance->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="col-sm-6">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{{ $withdrawBalance->updated_at }}</p>
    </div>

</div>
