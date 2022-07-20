{!! Form::open(['route' => ['businesses.destroy', $id], 'method' => 'delete', 'id' => 'delete-form-' . $id]) !!}
<div class='btn-group'>
    <a href="{{ route('businesses.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('businesses.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {{-- {!! Form::button('<i class="fa fa-trash"></i>', [
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'swalDelete(' . $id . ')',
    ]) !!} --}}
</div>
{!! Form::close() !!}
