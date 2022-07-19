<!-- Id Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_usaha', 'Id Usaha:') !!}
    {!! Form::select('id_usaha', $businesses, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- File Field -->
{{-- <div class="form-group col-sm-6">
    <div class="input-group">
        <input type="file" name="file[]" multiple="multiple">
    </div>
</div> --}}

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

<div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>

    <div class="form-group col-sm-6">
        <div class="form-check {{ $errors->has('is_photo') ? 'is-invalid' : '' }}">
            <input class="form-check-input" type="checkbox" name="is_photo" id="is_photo" value="1" {{ old('is_photo') == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="is_photo">{{ trans('cruds.task.fields.is_photo') }}</label>
        </div>
        @if ($errors->has('isphoto'))
            <div class="invalid-feedback">
                {{ §errors->first('is_photo') }}
            </div>
        @endif
        {{-- <span class="help-block">{{ trans('cruds.task.fields.is_photo_helper') }}</span> --}}
    </div>

</div>
