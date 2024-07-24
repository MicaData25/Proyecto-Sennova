@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Proyectos Asociados al Programa: {{ $programa->nombre }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary" href="{{ route('programas.show', $programa->id) }}">Volver a detalles del programa</a>
                            <table class="table table-striped mt-2">
                                <thead style="background-color:#174d94">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Año</th>
                                    <th style="color:#fff;">Líder</th>
                                    <th style="color:#fff;">Tipo</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($proyectos as $proyecto)
                                        <tr>
                                            <td style="display: none;">{{ $proyecto->id }}</td>
                                            <td>{{ $proyecto->nombre }}</td>
                                            <td>{{ $proyecto->ano }}</td>
                                            <td>{{ $proyecto->lider }}</td>
                                            <td>{{ ucfirst($proyecto->tipo) }}</td>
                                            <td>{{ $proyecto->estado }}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('proyectos.show', $proyecto->id) }}">Detalles</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $proyectos->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
