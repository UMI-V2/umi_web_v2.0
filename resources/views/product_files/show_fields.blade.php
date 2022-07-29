{{-- <!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $productFile->id }}</p>
</div>

<!-- Id Produk Field -->
<div class="col-sm-12">
    {!! Form::label('id_produk', 'Id Produk:') !!}
    <p>{{ $productFile->id_produk }}</p>
</div>

<!-- File Field -->
<div class="col-sm-12">
    {!! Form::label('file', 'File:') !!}
    <p>{{ $productFile->file }}</p>
</div>

<!-- Video Field -->
<div class="col-sm-12">
    {!! Form::label('video', 'Video:') !!}
    <p>{{ $productFile->video }}</p>
</div>

<!-- Photo Field -->
<div class="col-sm-12">
    {!! Form::label('photo', 'Photo:') !!}
    <p>{{ $productFile->photo }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $productFile->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $productFile->updated_at }}</p>
</div>
 --}}

 <div class="card card-primary">
    <div class="card-header">
        <h1 class="card-title"><strong>Foto-foto - {{ $product->nama }}</strong></h1>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ( $product->product_files as $file )
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