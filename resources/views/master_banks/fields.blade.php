<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Cost Admin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cost_admin', 'Cost Admin:') !!}
    {!! Form::text('cost_admin', null, ['class' => 'form-control']) !!}
</div>

<!-- Logo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logo', 'Logo:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('logo', ['class' => 'custom-file-input']) !!}
            {!! Form::label('logo', 'Choose File', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>