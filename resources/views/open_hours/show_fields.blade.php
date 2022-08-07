<!-- Id Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $openHour->id }}</p>
</div> --}}

<!-- Id Usaha Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('id_usaha', 'Nama Usaha:') !!}
    <p>{{ $openHour->businesses->nama_usaha }}</p>
</div> --}}

<div class="row">

<!-- Senin Field -->
<div class="col-sm-12">
    {!! Form::label('senin', 'Senin:') !!}
    <p>{{ (($business->open_hours->senin_buka) && ($business->open_hours->senin_tutup))  == null ? 'Tutup' : (($business->open_hours->senin_buka) . ' - ' . ($business->open_hours->senin_tutup)) }}</p>
</div>

<!-- Selasa Field -->
<div class="col-sm-6">
    {!! Form::label('selasa', 'Selasa:') !!}
    <p>{{ (($business->open_hours->selasa_buka ==null) && ($business->open_hours->selasa_tutup  == null)) ? 'Tutup' : (($business->open_hours->selasa_buka) . ' - ' . ($business->open_hours->selasa_tutup)) }}</p>
</div>

<!-- Rabu Field -->
<div class="col-sm-6">
    {!! Form::label('rabu', 'Rabu:') !!}
    <p>{{ (($business->open_hours->rabu_buka ==null) && ($business->open_hours->rabu_tutup  == null)) ? 'Tutup' : (($business->open_hours->rabu_buka) . ' - ' . ($business->open_hours->rabu_tutup)) }}</p>
</div>

<!-- Kamis Field -->
<div class="col-sm-6">
    {!! Form::label('kamis', 'Kamis:') !!}
    <p>{{ (($business->open_hours->kamis_buka ==null) && ($business->open_hours->kamis_tutup  == null)) ? 'Tutup' : (($business->open_hours->kamis_buka) . ' - ' . ($business->open_hours->kamis_tutup)) }}</p>
</div>

<!-- Jumat Field -->
<div class="col-sm-6">
    {!! Form::label('jumat', 'Jumat:') !!}
    <p>{{ (($business->open_hours->jumat_buka ==null) && ($business->open_hours->jumat_tutup  == null)) ? 'Tutup' : (($business->open_hours->jumat_buka) . ' - ' . ($business->open_hours->jumat_tutup)) }}</p>
</div>

<!-- Sabtu Field -->
<div class="col-sm-6">
    {!! Form::label('sabtu', 'Sabtu:') !!}
    <p>{{ (($business->open_hours->sabtu_buka ==null) && ($business->open_hours->sabtu_tutup  == null)) ? 'Tutup' : (($business->open_hours->sabtu_buka) . ' - ' . ($business->open_hours->sabtu_tutup)) }}</p>
</div>

<!-- Minggu Field -->
<div class="col-sm-6">
    {!! Form::label('minggu', 'Minggu:') !!}
    <p>{{ (($business->open_hours->minggu_buka ==null) && ($business->open_hours->minggu_tutup  == null)) ? 'Tutup' : (($business->open_hours->minggu_buka) . ' - ' . ($business->open_hours->minggu_tutup)) }}</p>
</div>

</div>