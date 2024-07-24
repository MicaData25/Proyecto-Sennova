@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Inicio</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container mt-4">
                                <!-- Búsqueda Avanzada -->
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <h4>Búsqueda Avanzada</h4>
                                        <form action="{{ route('search') }}" method="GET">
                                            <div class="input-group">
                                                <input type="text" name="query" class="form-control" placeholder="Buscar...">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                                <h3 class="text-center"> HOLA, {{\Illuminate\Support\Facades\Auth::user()->name}}</h3>
                                
                                <!-- Logo de SENNOVA -->
                                <div class="row justify-content-center mt-4">
                                    <div class="col-md-6 text-center">
                                        <img src="{{ asset('images/logo_sennova.png') }}" alt="Logo de SENNOVA" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
