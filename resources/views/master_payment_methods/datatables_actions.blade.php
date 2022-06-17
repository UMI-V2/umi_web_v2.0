{!! Form::open(['route' => ['masterPaymentMethods.destroy', $id], 'method' => 'delete', 'id' => 'delete-form-' . $id]) !!}
<div class='btn-group'>
    <a href="{{ route('masterPaymentMethods.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('masterPaymentMethods.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
    'class' => 'btn btn-danger btn-xs',
    'onclick' => 'swalDelete(' . $id . ')',
]) !!}
</div>
{!! Form::close() !!}
