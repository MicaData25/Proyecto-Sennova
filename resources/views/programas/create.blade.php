@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ingresar Nuevo Programa de Formación</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('programas.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nombre">Nombre del Programa</label>
                                    <input type="text" name="nombre" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="año">Año</label>
                                    <input type="number" name="año" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="lider_instructor">Líder/Instructor</label>
                                    <input type="text" name="lider_instructor" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea name="descripcion" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="duracion">Duración</label>
                                    <input type="text" name="duracion" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="otros_detalles">Otros detalles</label>
                                    <textarea name="otros_detalles" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
