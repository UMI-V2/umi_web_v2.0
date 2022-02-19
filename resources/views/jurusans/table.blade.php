<div class="table-responsive">
    <table class="table" id="jurusans-table">
        <thead>
        <tr>
            <th>Nama Jurusan</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($jurusans as $jurusan)
            <tr>
                <td>{{ $jurusan->nama_jurusan }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['jurusans.destroy', $jurusan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('jurusans.show', [$jurusan->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('jurusans.edit', [$jurusan->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
