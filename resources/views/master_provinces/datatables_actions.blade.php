{!! Form::open(['route' => ['masterProvinces.destroy', $province_id], 'method' => 'delete', 'id' => 'delete-form-' . $province_id]) !!}
<div class='btn-group'>
    <a href="{{ route('masterProvinces.show', $province_id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('masterProvinces.edit', $province_id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
    'class' => 'btn btn-danger btn-xs',
    'onclick' => 'swalDelete(' . $province_id . ')',
]) !!}
</div>
{!! Form::close() !!}
