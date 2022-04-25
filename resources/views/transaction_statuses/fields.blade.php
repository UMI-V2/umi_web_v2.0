<!-- Id Transaksi Penjualan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_transaksi_penjualan', 'Id Transaksi Penjualan:') !!}
    {!! Form::select('id_transaksi_penjualan', $sales_transactions, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Tanggal Pesanan Dibuat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_pesanan_dibuat', 'Tanggal Pesanan Dibuat:') !!}
    {!! Form::text('tanggal_pesanan_dibuat', null, ['class' => 'form-control','id'=>'tanggal_pesanan_dibuat']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal_pesanan_dibuat').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Tanggal Pembayaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_pembayaran', 'Tanggal Pembayaran:') !!}
    {!! Form::text('tanggal_pembayaran', null, ['class' => 'form-control','id'=>'tanggal_pembayaran']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal_pembayaran').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Tanggal Pesanan Dikirimkan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_pesanan_dikirimkan', 'Tanggal Pesanan Dikirimkan:') !!}
    {!! Form::text('tanggal_pesanan_dikirimkan', null, ['class' => 'form-control','id'=>'tanggal_pesanan_dikirimkan']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal_pesanan_dikirimkan').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Tanggal Pesanan Diterima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_pesanan_diterima', 'Tanggal Pesanan Diterima:') !!}
    {!! Form::text('tanggal_pesanan_diterima', null, ['class' => 'form-control','id'=>'tanggal_pesanan_diterima']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal_pesanan_diterima').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush