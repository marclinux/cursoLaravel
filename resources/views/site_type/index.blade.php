@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-danger" href="{{ route('site_type.create') }}">Nuevo</a>
    @foreach ($tipos as $tipo)
        <div class="row">
            <div class="col-lg">
                <p>{{ $tipo->id }}</p>
            </div>
            <div class="col-lg">
                <p>{{ $tipo->name }}</p>
            </div>
            <div class="col-lg">
                <form action="{{ route('site_type.destroy', [$tipo->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class='btn-group'>
                        <a href="{{ route('site_type.show', [$tipo->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('site_type.edit', [$tipo->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        <button class="btn btn-danger" type="submit" onclick ="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection