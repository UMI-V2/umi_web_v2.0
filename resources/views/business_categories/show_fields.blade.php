<!-- Id Field -->
{{-- <div class="col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $businessCategory->id }}</p>
</div> --}}

<div class="row">
    @foreach ($business->category as $business)
        {{-- <!-- Id Usaha Field -->
        <div class="col-sm-6">
            {!! Form::label('id_usaha', 'Kategori:') !!}
            <p>{{ $business->category }}</p>
        </div> --}}

        <!-- Id Master Kategori Usaha Field -->
        <div class="col-sm-12">
            {!! Form::label('id_master_kategori_usaha', 'Kategori:') !!}
            <p>{{ $business->master_business_categories->nama_kategori_usaha }}</p>
        </div>
        
        {{-- <!-- Id Master Kategori Usaha Field -->
        <div class="col-sm-6">
            {!! Form::label('status_kategori_usaha', 'Status Master Kategori:') !!}
            <p>{{ $business->master_business_categories->status_kategori_usaha }}</p>
        </div> --}}

        <!-- Created At Field -->
        <div class="col-sm-6">
            {!! Form::label('created_at', 'Created At:') !!}
            <p>{{ $business->created_at }}</p>
        </div>

        <!-- Updated At Field -->
        <div class="col-sm-6">
            {!! Form::label('updated_at', 'Updated At:') !!}
            <p>{{ $business->updated_at }}</p>
        </div>
        <hr style="height:2px; width:100%; border-width:0; color:white; background-color:white">
    @endforeach
</div>
