<!-- Event Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('event_id', 'Nama Event:') !!}
    {!! Form::select('event_id', $events, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Nama Penyelenggara:') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control custom-select']) !!}
</div>
