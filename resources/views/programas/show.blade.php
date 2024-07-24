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
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Nombre del Programa:</h4>
                                    <p>{{ $programa->nombre }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4>Año:</h4>
                                    <p>{{ $programa->año }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4>Líder/Instructor:</h4>
                                    <p>{{ $programa->lider_instructor }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4>Descripción:</h4>
                                    <p>{{ $programa->descripcion }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4>Duración:</h4>
                                    <p>{{ $programa->duracion }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4>Otros detalles:</h4>
                                    <p>{{ $programa->otros_detalles }}</p>
                                </div>
                            </div>
                            <a href="{{ route('programas.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
                            <a href="{{ route('programas.proyectosAsociados', $programa->id) }}" class="btn btn-primary mt-3">Proyectos Asociados</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
