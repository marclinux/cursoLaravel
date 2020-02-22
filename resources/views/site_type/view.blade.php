@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <label for="name">Nombre:</label>
        </div>
        <div class="col-md">
            <label for="name">{{ $tipo->name }}</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            @if ($tipo->active == 1)
                <input type="checkbox" name="active" id="active" checked disabled>                
            @else
                <input type="checkbox" name="active" id="active" disabled>                                
            @endif
            <label for="active">Activo:</label>
        </div>
    </div>
    <a href="{{ route('site_type.index') }}" class='btn btn-danger btn-xs'>Regresar</a>
</div>
@endsection