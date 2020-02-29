<!-- Texto Field -->
<div class="form-group">
    {!! Form::label('texto', 'Texto:') !!}
    <p>{{ $comments->texto }}</p>
</div>

<!-- Fecha Field -->
<div class="form-group">
    {!! Form::label('fecha', 'Fecha:') !!}
    <p>{{ $comments->fecha }}</p>
</div>

<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', 'Active:') !!}
    <p>{{ $comments->active }}</p>
</div>

<!-- Site Id Field -->
<div class="form-group">
    {!! Form::label('site_id', 'Site Id:') !!}
    <p>{{ $comments->site_id }}</p>
</div>

