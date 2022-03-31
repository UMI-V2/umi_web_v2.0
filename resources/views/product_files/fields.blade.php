<!-- Id Produk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_produk', 'Id Produk:') !!}
    {!! Form::select('id_produk', $products, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file', 'File:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('file', ['class' => 'custom-file-input']) !!}
            {!! Form::label('file', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- 'bootstrap / Toggle Switch Video Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('video', 'Video:') !!}
    {!! Form::hidden('video', 0) !!}
    {!! Form::checkbox('video', 1, null,  ['data-bootstrap-switch']) !!}
</div>


<!-- 'bootstrap / Toggle Switch Photo Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::hidden('photo', 0) !!}
    {!! Form::checkbox('photo', 1, null,  ['data-bootstrap-switch']) !!}
</div>
