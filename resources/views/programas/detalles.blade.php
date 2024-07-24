@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Detalles del Programa de Formación</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <p><strong>Nombre del Programa:</strong> {{ $programa->nombre }}</p>
                        <p><strong>Año:</strong> {{ $programa->ano }}</p>
                        <p><strong>Líder/Instructor:</strong> {{ $programa->lider_instructor }}</p>
                        <p><strong>Duración:</strong> {{ $programa->duracion }}</p>
                        <p><strong>Descripción:</strong> {{ $programa->descripcion }}</p>
                        <p><strong>Otros detalles:</strong> {{ $programa->otros_detalles }}</p>
                        <a class="btn btn-secondary" href="{{ route('programas.index') }}">Volver a la lista</a>
                        <a class="btn btn-primary" href="{{ route('programas.proyectosAsociados', $programa->id) }}">Proyectos Asociados</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
