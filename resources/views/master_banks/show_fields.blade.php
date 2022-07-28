<!-- Id Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $masterBank->id }}</p>
</div> --}}

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $masterBank->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $masterBank->description }}</p>
</div>

<!-- Cost Admin Field -->
<div class="col-sm-12">
    {!! Form::label('cost_admin', 'Cost Admin:') !!}
    <p>{{ $masterBank->cost_admin == '0' ? 'Gratis Biaya Admin' : 'Rp. ' ($masterBank->cost_admin) }}</p>
</div>

<!-- Logo Field -->
<div class="col-sm-12">
    {!! Form::label('logo', 'Logo:') !!}
    <p><img src="{{ $masterBank->logo }}" width="150px" class="img-fluid mb-2" alt="white sample" style="border-radius: 25%"></p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $masterBank->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $masterBank->updated_at }}</p>
</div>

