<!-- Id Usaha Field -->
<div class="form-group col-sm-4">
{!! Form::label('id_usaha', 'Usaha') !!}
</div>
<div class="form-group col-sm-8">
    {!! Form::select('id_usaha', $businesses, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Senin Field -->
<div class="form-group col-sm-4">
{!! Form::label('senin', 'Hari Senin') !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::text('senin_buka', null, ['class' => 'form-control','id'=>'senin_buka']) !!}
</div>
<div class="form-group col-sm-4">
    <!-- {!! Form::label('senin', 'Senin:') !!} -->
    {!! Form::text('senin_tutup', null, ['class' => 'form-control','id'=>'senin_tutup']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#senin_buka').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

@push('page_scripts')
    <script type="text/javascript">
        $('#senin_tutup').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush
<!-- Selasa Field -->
<div class="form-group col-sm-4">
{!! Form::label('selasa', 'Hari Selasa') !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::text('selasa_buka', null, ['class' => 'form-control','id'=>'selasa_buka']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::text('selasa_tutup', null, ['class' => 'form-control','id'=>'selasa_tutup']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#selasa_buka').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

@push('page_scripts')
    <script type="text/javascript">
        $('#selasa_tutup').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Rabu Field -->
<div class="form-group col-sm-4">
{!! Form::label('rabu', 'Hari Rabu') !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::text('rabu_buka', null, ['class' => 'form-control','id'=>'rabu_buka']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::text('rabu_tutup', null, ['class' => 'form-control','id'=>'rabu_tutup']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#rabu_buka').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

@push('page_scripts')
    <script type="text/javascript">
        $('#rabu_tutup').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Kamis Field -->
<div class="form-group col-sm-4">
{!! Form::label('kamis', 'Hari Kamis') !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::text('kamis_buka', null, ['class' => 'form-control','id'=>'kamis_buka']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::text('kamis_tutup', null, ['class' => 'form-control','id'=>'kamis_tutup']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#kamis_buka').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

@push('page_scripts')
    <script type="text/javascript">
        $('#kamis_tutup').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Jumat Field -->
<div class="form-group col-sm-4">
{!! Form::label('jumat', 'Hari Jumat') !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::text('jumat_buka', null, ['class' => 'form-control','id'=>'jumat_buka']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::text('jumat_tutup', null, ['class' => 'form-control','id'=>'jumat_tutup']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#jumat_buka').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

@push('page_scripts')
    <script type="text/javascript">
        $('#jumat_tutup').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Sabtu Field -->
<div class="form-group col-sm-4">
{!! Form::label('sabtu', 'Hari Sabtu') !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::text('sabtu_buka', null, ['class' => 'form-control','id'=>'sabtu_buka']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::text('sabtu_tutup', null, ['class' => 'form-control','id'=>'sabtu_tutup']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#sabtu_buka').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

@push('page_scripts')
    <script type="text/javascript">
        $('#sabtu_tutup').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Minggu Field -->
<div class="form-group col-sm-4">
{!! Form::label('minggu', 'Hari Minggu') !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::text('minggu_buka', null, ['class' => 'form-control','id'=>'minggu_buka']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::text('minggu_tutup', null, ['class' => 'form-control','id'=>'minggu_tutup']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#minggu_buka').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

@push('page_scripts')
    <script type="text/javascript">
        $('#minggu_tutup').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush