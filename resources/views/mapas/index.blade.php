@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <select @change="onChange($event)" class="form-control" v-model="key">
            <option value="0" selected>Todos</option>
            @foreach ($tipos as $tipo)
            <option value="{{ $tipo->id }}"> 
                {{ $tipo->name }} 
            </option>
            @endforeach    
        </select>
    </div>
    <div class="row">
        <h1>Mapa de sitios</h1>
    </div>
    <div class="row">
        <mapa-component ref="mapa"></mapa-component>
    </div>
</div>
@endsection