<!-- Id Produk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_produk', 'Id Produk:') !!}
    {!! Form::select('id_produk', $products, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Nama Promo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_promo', 'Nama Promo:') !!}
    {!! Form::text('nama_promo', null, ['class' => 'form-control']) !!}
</div>

<!-- Waktu Mulai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waktu_mulai', 'Waktu Mulai:') !!}
    {!! Form::text('waktu_mulai', null, ['class' => 'form-control','id'=>'waktu_mulai']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#waktu_mulai').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Waktu Berakhir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waktu_berakhir', 'Waktu Berakhir:') !!}
    {!! Form::text('waktu_berakhir', null, ['class' => 'form-control','id'=>'waktu_berakhir']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#waktu_berakhir').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::text('harga', null, ['class' => 'form-control']) !!}
</div>

<!-- Batas Pembelian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('batas_pembelian', 'Batas Pembelian:') !!}
    {!! Form::number('batas_pembelian', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-12">
    {!! Form::label('type', 'Type', ['class' => 'form-check-label']) !!}
    <label class="form-check">
    {!! Form::radio('type', "0", null, ['class' => 'form-check-input']) !!} Presentase
</label>

<label class="form-check">
    {!! Form::radio('type', "1", null, ['class' => 'form-check-input']) !!} Potongan Harga
</label>

</div>
