<!-- Id Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_usaha', 'Id Usaha:') !!}
    {!! Form::select('id_usaha', $businesses, null, ['class' => 'form-control custom-select']) !!}
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


<!-- 'bootstrap / Toggle Switch Is Video Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_video', 'Is Video:') !!}
    {!! Form::hidden('is_video', 0) !!}
    {!! Form::checkbox('is_video', 1, null,  ['data-bootstrap-switch']) !!}
</div>


<!-- Is Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_photo', 'Is Photo:') !!}
    {!! Form::hidden('is_photo', 0) !!}
    {!! Form::checkbox('is_photo', 1, null,  ['data-bootstrap-switch']) !!}
</div>

</div>
