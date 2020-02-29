<div class="table-responsive">
    <table class="table" id="comments-table">
        <thead>
            <tr>
                <th>Texto</th>
        <th>Fecha</th>
        <th>Active</th>
        <th>Site Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($comments as $comments)
            <tr>
                <td>{{ $comments->texto }}</td>
            <td>{{ $comments->fecha }}</td>
            <td>{{ $comments->active }}</td>
            <td>{{ $comments->site_id }}</td>
                <td>
                    {!! Form::open(['route' => ['comments.destroy', $comments->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('comments.show', [$comments->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('comments.edit', [$comments->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
