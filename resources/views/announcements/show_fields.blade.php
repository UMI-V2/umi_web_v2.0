<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $announcement->id }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $announcement->title }}</p>
</div>

<!-- Sub Title Field -->
<div class="col-sm-12">
    {!! Form::label('sub_title', 'Sub Title:') !!}
    <p>{{ $announcement->sub_title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $announcement->description }}</p>
</div>

<!-- Author Field -->
<div class="col-sm-12">
    {!! Form::label('author', 'Author:') !!}
    <p>{{ $announcement->author }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $announcement->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $announcement->updated_at }}</p>
</div>

