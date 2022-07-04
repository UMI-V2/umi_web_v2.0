<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $eventRegister->id }}</p>
</div>

<!-- Event Id Field -->
<div class="col-sm-12">
    {!! Form::label('event_id', 'Nama Event:') !!}
    <p>{{ $eventRegister->event_id }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'Nama Penyelenggara:') !!}
    <p>{{ $eventRegister->user_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $eventRegister->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $eventRegister->updated_at }}</p>
</div>

