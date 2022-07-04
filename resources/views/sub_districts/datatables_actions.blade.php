{!! Form::open(['route' => ['subDistricts.destroy', $subdistrict_id], 'method' => 'delete', 'id' => 'delete-form-' . $subdistrict_id]) !!}
<div class='btn-group'>
    <a href="{{ route('subDistricts.show', $subdistrict_id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('subDistricts.edit', $subdistrict_id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
    'class' => 'btn btn-danger btn-xs',
    'onclick' => 'swalDelete(' . $subdistrict_id . ')',
]) !!}
</div>
{!! Form::close() !!}
