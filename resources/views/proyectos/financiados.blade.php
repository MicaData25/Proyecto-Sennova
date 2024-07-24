@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Proyectos Financiados</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped mt-2">
                                <thead style="background-color:#174d94">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Año</th>
                                    <th style="color:#fff;">Lider</th>
                                    <th style="color:#fff;">Programa de Formación</th>
                                    <th style="color:#fff;">Valor Financiado</th>
                                    <th style="color:#fff;">Productos</th>
                                    <th style="color:#fff;">Ponencias</th>
                                    <th style="color:#fff;">EDT</th>
                                    <th style="color:#fff;">Libro</th>
                                    <th style="color:#fff;">Articulo</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($proyectos as $proyecto)
                                        <tr>
                                            <td style="display: none;">{{ $proyecto->id }}</td>
                                            <td>{{ $proyecto->nombre }}</td>
                                            <td>{{ $proyecto->ano }}</td>
                                            <td>{{ $proyecto->lider }}</td>
                                            <td>{{ $proyecto->programaFormacion }}</td>
                                            <td>{{ $proyecto->valorFinanciero }}</td>
                                            <td>{{ $proyecto->productos }}</td>
                                            <td>{{ $proyecto->ponencias }}</td>
                                            <td>{{ $proyecto->edt }}</td>
                                            <td>{{ $proyecto->libro }}</td>
                                            <td>{{ $proyecto->articulo }}</td>
                                            <td>
                                                @can('editar-proyecto')
                                                    <a class="btn btn-info" title="Editar" href="{{ route('proyectos.edit', $proyecto->id) }}"><i class="fas fa-edit"></i></a>
                                                @endcan
                                                @can('borrar-proyecto')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['proyectos.destroy', $proyecto->id], 'style' => 'display:inline']) !!}
                                                    {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Eliminar']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
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
