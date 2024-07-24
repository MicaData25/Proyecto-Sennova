@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Listado de Proyectos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">  
                            @can('crear-proyecto')       
                                <a class="btn btn-success" href="{{ route('proyectos.create') }}">Nuevo</a>   
                            @endcan
                            <a href="{{ route('export.proyectos') }}" class="btn btn-primary">Exportar Proyectos</a>

                            <!-- Botones para Proyectos Financiados y Proyectos Semilleros -->
                            <div class="mt-3">
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalFinanciados">
                                    Proyectos Financiados
                                </button>
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalSemilleros">
                                    Proyectos Semilleros
                                </button>
                            </div>
                   
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
                                    @foreach ($proyectos as $proy)
                                        <tr>
                                            <td style="display: none;">{{ $proy->id }}</td>                                
                                            <td>
                                                <a href="{{ route('proyectos.show', $proy->id) }}">{{ $proy->nombre }}</a>
                                            </td>
                                            <td>{{ $proy->ano }}</td>
                                            <td>{{ $proy->lider }}</td>
                                            <td>{{ $proy->programaFormacion }}</td>
                                            <td>{{ $proy->valorFinanciero }}</td>
                                            <td>{{ $proy->productos }}</td>
                                            <td>{{ $proy->ponencias }}</td>
                                            <td>{{ $proy->edt }}</td>
                                            <td>{{ $proy->libro }}</td>
                                            <td>{{ $proy->articulo }}</td>
                                            <td>   
                                                @can('editar-proyecto')                                      
                                                    <a class="btn btn-info" title="Editar" href="{{ route('proyectos.edit',$proy->id) }}"><i class="fas fa-edit"></i></a>
                                                @endcan     
                                                @can('borrar-proyecto')         
                                                    {!! Form::open(['method' => 'DELETE','route' => ['proyectos.destroy', $proy->id],'style'=>'display:inline']) !!}
                                                    {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit','class' => 'btn btn-danger', 'title'=>'Eliminar']) !!}
                                                    {!! Form::close() !!}
                                                @endcan       
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Centramos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $proyectos->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Incluir el modal -->
    @include('proyectos.modals.financiados')
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#searchButton').on('click', function() {
            var projectName = $('#projectName').val();
            $.ajax({
                url: '{{ route("proyectos.searchFinanciados") }}',
                method: 'GET',
                data: {
                    projectName: projectName
                },
                success: function(response) {
                    $('#searchResults').html(response);
                }
            });
        });
    });
</script>
@endsection
