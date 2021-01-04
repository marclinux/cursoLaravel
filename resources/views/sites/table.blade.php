<div class="table-responsive">
    <table class="table" id="sites-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Active</th>
        <th>Type Id</th>
        <th>Lat</th>
        <th>Long</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sites as $site)
            <tr>
                <td>{{ $site->name }}</td>
            <td>{{ $site->active }}</td>
            <td>{{ $site->type->name }}</td>
            <td>{{ $site->lat }}</td>
            <td>{{ $site->long }}</td>
                <td>
                    {!! Form::open(['route' => ['sites.destroy', $site->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('sites.show', [$site->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('sites.edit', [$site->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
