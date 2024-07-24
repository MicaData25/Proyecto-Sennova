@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Detalles del Proyecto</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                {{ $proyecto->nombre }}
                            </div>
                            <div class="form-group">
                                <strong>Año:</strong>
                                {{ $proyecto->ano }}
                            </div>
                            <div class="form-group">
                                <strong>Líder:</strong>
                                {{ $proyecto->lider }}
                            </div>
                            <div class="form-group">
                                <strong>Programa de Formación:</strong>
                                {{ $proyecto->programaFormacion }}
                            </div>
                            <div class="form-group">
                                <strong>Valor Financiado:</strong>
                                {{ $proyecto->valorFinanciero }}
                            </div>
                            <div class="form-group">
                                <strong>Productos:</strong>
                                {{ $proyecto->productos }}
                            </div>
                            <div class="form-group">
                                <strong>Ponencias:</strong>
                                {{ $proyecto->ponencias }}
                            </div>
                            <div class="form-group">
                                <strong>EDT:</strong>
                                {{ $proyecto->edt }}
                            </div>
                            <div class="form-group">
                                <strong>Libro:</strong>
                                {{ $proyecto->libro }}
                            </div>
                            <div class="form-group">
                                <strong>Artículo:</strong>
                                {{ $proyecto->articulo }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
