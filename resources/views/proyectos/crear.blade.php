@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Proyecto</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {!! Form::open(array('route' => 'proyectos.store','method'=>'POST')) !!}
                                <div class="row">
                                    <div class="col-xs-8 col-sm-8 col-md-8">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            {!! Form::text('nombre', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="ano">Año</label>
                                            {!! Form::text('ano', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9">
                                        <div class="form-group">
                                            <label for="lider">Líder</label>
                                            {!! Form::text('lider', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="programaFormacion">Programa de Formación</label>
                                            {!! Form::select('programaFormacion', $programas->pluck('nombre', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione un programa de formación']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="valorFinanciero">Valor Financiado</label>
                                            {!! Form::text('valorFinanciero', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="productos">Productos</label>
                                            {!! Form::text('productos', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="ponencias">Ponencias</label>
                                            {!! Form::text('ponencias', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="edt">EDT</label>
                                            {!! Form::text('edt', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="libro">Libro</label>
                                            {!! Form::text('libro', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="articulo">Artículo</label>
                                            {!! Form::text('articulo', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="tipo">Tipo de Proyecto a Crear</label>
                                            {!! Form::select('tipo', ['financiado' => 'Financiado', 'semillero' => 'Semillero'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el tipo de proyecto']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
