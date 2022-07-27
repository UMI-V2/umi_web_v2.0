<div class="card card-primary">
    <div class="card-header">
        <h1 class="card-title"><strong>Foto-foto - {{ $business->nama_usaha }}</strong></h1>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ( $business->business_file as $file )
                <div class="col-sm-2">
                <a href="{{ $file->file }}" data-toggle="lightbox"
                    data-title="sample 1 - white" data-gallery="gallery">
                    <img src="{{ $file->file }}" class="img-fluid mb-2" alt="white sample">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>



<!-- Id Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $businessFile->id }}</p>
</div> --}}

<!-- Id Usaha Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('id_usaha', 'Id Usaha:') !!}
    <p>{{ $businessFile->id_usaha }}</p>
</div> --}}

<!-- File Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('file', 'File:') !!}
    <p>{{ $businessFile->file }}</p>
</div> --}}

<!-- Is Video Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('is_video', 'Is Video:') !!}
    <p>{{ $businessFile->is_video }}</p>
</div> --}}

<!-- Is Photo Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('is_photo', 'Is Photo:') !!}
    <p>{{ $businessFile->is_photo }}</p>
</div> --}}

<!-- Created At Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $businessFile->created_at }}</p>
</div> --}}

<!-- Updated At Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $businessFile->updated_at }}</p>
</div> --}}
