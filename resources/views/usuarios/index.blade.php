@extends('layouts.app')
@section('content')
  <section class="section">
    <div class="section-header">
      <h3 class="page__heading">Listado de Usuarios</h3>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
        <form action="{{route('usuarios.index')}}">
        <div class="card">
                            <div class="card-body">  
                                <div class="form-row"> 
                                    <div class="col-sm-4 my-1">
                                        <input type="text" class="form-control" name="texUsuario" value="{{$texUsuario}}">
                                    </div>
                                    <div class="col-auto my-1">
                                        <input type="submit" class="btn btn-primary" value="Buscar">
                                    </div>
                                </div>
                            </div>
                        </div>   
          <div class="card">
            <div class="card-body">       
            @can('crear-usuario')                     
                <a class="btn btn-success" href="{{ route('usuarios.create') }}">Nuevo</a>       
                @endcan  
                <table class="table table-striped mt-2">
                  <thead style="background-color:#174d94">                                     
                    <th style="display: none;">ID</th>
                    <th style="color:#fff;">Nombre</th>
                    <th style="color:#fff;">E-mail</th>
                    <th style="color:#fff;">Rol</th>
                    <th style="color:#fff;">Acciones</th>                                                                   
                  </thead>
                  <tbody>
                  @if(count($usuarios) <=0)
                                            <tr>
                                                <td colspan="6">
                                                    ¡No hay Resultados!
                                                </td>
                                            </tr>
                                        @else
                    @foreach ($usuarios as $usuario)
                      <tr>
                        <td style="display: none;">{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                          @if(!empty($usuario->getRoleNames()))
                            @foreach($usuario->getRoleNames() as $rolNombre)                                       
                              <h5><span class="badge badge-success">{{ $rolNombre }}</span></h5>
                            @endforeach
                          @endif
                        </td>
                        <td>   
                        @can('editar-usuario')                                      
                          <a class="btn btn-info" title="Editar" href="{{ route('usuarios.edit',$usuario->id) }}"><i class="fas fa-edit"></i></a>
                          @endcan     
                          @can('borrar-usuario')         
                          {!! Form::open(['method' => 'DELETE','route' => ['usuarios.destroy', $usuario->id],'style'=>'display:inline']) !!}
                          <!--{!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}-->
                          {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit','class' => 'btn btn-danger', 'title'=>'Eliminar']) !!}
                          {!! Form::close() !!}
                          @endcan       
                        </td>
                      </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
                <!-- Centramos la paginacion a la derecha -->
                <div class="pagination justify-content-end">
                  {!! $usuarios->links() !!}
                </div>            
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection