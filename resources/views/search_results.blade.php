@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Resultados de la Búsqueda</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Resultados de la Búsqueda</h3>
                            @if($results->isEmpty())
                                <p>No se encontraron resultados.</p>
                            @else
                                <ul>
                                    @foreach($results as $result)
                                        <li>{{ $result->nombre }}</li> <!-- Ajusta según tu modelo -->
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
