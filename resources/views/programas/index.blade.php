@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Programas de formación</h3>
            <div class="section-header-breadcrumb">
                <a href="{{ route('programas.create') }}" class="btn btn-primary">Ingresar Nuevo Programa</a>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#consultarProgramaModal">
                    Consultar por programa
                </button>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Lista de Programas de formación</h3>
                            @if(count($programas) > 0)
                                <ul>
                                    @foreach($programas as $programa)
                                        <li><a href="{{ route('programas.show', $programa->id) }}">{{ $programa->nombre }}</a></li>
                                    @endforeach
                                </ul>
                            @else
                                <p>No hay programas de formación disponibles.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="consultarProgramaModal" tabindex="-1" role="dialog" aria-labelledby="consultarProgramaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="consultarProgramaModalLabel">Consultar por Programa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="consultarProgramaForm">
                        <div class="form-group">
                            <label for="programa_id">Seleccionar Programa</label>
                            <select name="programa_id" id="programa_id" class="form-control">
                                @foreach($programas as $programa)
                                    <option value="{{ $programa->id }}">{{ $programa->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Consultar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('consultarProgramaForm').addEventListener('submit', function (e) {
            e.preventDefault();
            var programaId = document.getElementById('programa_id').value;
            window.location.href = '/programas/' + programaId;
        });
    </script>
@endsection
