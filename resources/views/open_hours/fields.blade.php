<!-- Id Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_usaha', 'Id Usaha:') !!}
    {!! Form::select('id_usaha', $businesses, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Senin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('senin', 'Senin:') !!}
    {!! Form::text('senin', null, ['class' => 'form-control','id'=>'senin']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#senin').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Selasa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('selasa', 'Selasa:') !!}
    {!! Form::text('selasa', null, ['class' => 'form-control','id'=>'selasa']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#selasa').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Rabu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rabu', 'Rabu:') !!}
    {!! Form::text('rabu', null, ['class' => 'form-control','id'=>'rabu']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#rabu').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Kamis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kamis', 'Kamis:') !!}
    {!! Form::text('kamis', null, ['class' => 'form-control','id'=>'kamis']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#kamis').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Jumat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumat', 'Jumat:') !!}
    {!! Form::text('jumat', null, ['class' => 'form-control','id'=>'jumat']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#jumat').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Sabtu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sabtu', 'Sabtu:') !!}
    {!! Form::text('sabtu', null, ['class' => 'form-control','id'=>'sabtu']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#sabtu').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Minggu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('minggu', 'Minggu:') !!}
    {!! Form::text('minggu', null, ['class' => 'form-control','id'=>'minggu']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#minggu').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush