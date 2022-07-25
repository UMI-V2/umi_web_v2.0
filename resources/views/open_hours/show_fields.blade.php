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

<!-- Senin Field -->
<div class="col-sm-12">
    {!! Form::label('senin', 'Senin:') !!}
    <p>{{ $openHour->senin_buka && $openHour->senin_tutup  == null ? 'Tutup' : $openHour->senin_buka . ' - ' . $openHour->senin_tutup }}</p>
    {{-- <p>{{ $openHour->senin_buka }} - {{ $openHour->senin_tutup }}</p> --}}
</div>

<!-- Selasa Field -->
<div class="col-sm-12">
    {!! Form::label('selasa', 'Selasa:') !!}
    <p>{{ $openHour->selasa_buka }} - {{ $openHour->selasa_tutup }}</p>
</div>

<!-- Rabu Field -->
<div class="col-sm-12">
    {!! Form::label('rabu', 'Rabu:') !!}
    <p>{{ $openHour->rabu_buka }} - {{ $openHour->rabu_tutup }}</p>
</div>

<!-- Kamis Field -->
<div class="col-sm-12">
    {!! Form::label('kamis', 'Kamis:') !!}
    <p>{{ $openHour->kamis_buka }} - {{ $openHour->kamis_tutup }}</p>
</div>

<!-- Jumat Field -->
<div class="col-sm-12">
    {!! Form::label('jumat', 'Jumat:') !!}
    <p>{{ $openHour->jumat_buka }} - {{ $openHour->jumat_tutup }}</p>
</div>

<!-- Sabtu Field -->
<div class="col-sm-12">
    {!! Form::label('sabtu', 'Sabtu:') !!}
    <p>{{ $openHour->sabtu_buka }} - {{ $openHour->sabtu_tutup }}</p>
</div>

<!-- Minggu Field -->
<div class="col-sm-12">
    {!! Form::label('minggu', 'Minggu:') !!}
    <p>{{ (($openHour->minggu_buka ==null) && ($openHour->minggu_tutup  == null)) ? 'Tutup' : $openHour->minggu_buka . ' - ' . $openHour->minggu_tutup }}</p>
    {{-- <p>{{ $openHour->minggu_buka }} - {{ $openHour->minggu_tutup }}</p> --}}
</div>

