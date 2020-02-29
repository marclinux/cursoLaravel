@extends('layouts.app')

@section('content')
<h1>Create Site Type</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <form action="{{ route('site_type.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md">
                <label for="name">Nombre:</label>
            </div>
            <div class="col-md">
                <input type="text" name="name" id="name">
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <input type="checkbox" name="active" id="active" checked>
                <label for="active">Activo:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <input type="submit" value="Guardar" class="btn btn-danger">
            </div>
        </div>
    </form>
</div>
@endsection