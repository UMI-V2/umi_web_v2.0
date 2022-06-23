{!! Form::open(['route' => ['master_cities.destroy', $city_id], 'method' => 'delete', 'id' => 'delete-form-' . $city_id]) !!}
<div class='btn-group'>
    <a href="{{ route('master_cities.show', $city_id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('master_cities.edit', $city_id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
    'class' => 'btn btn-danger btn-xs',
    'onclick' => 'swalDelete(' . $city_id . ')',
]) !!}
</div>
{!! Form::close() !!}
