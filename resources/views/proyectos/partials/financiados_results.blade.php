@foreach ($proyectos as $proyecto)
    <tr>
        <td style="display: none;">{{ $proyecto->id }}</td>
        <td><a href="{{ route('proyectos.show', $proyecto->id) }}">{{ $proyecto->nombre }}</a></td>
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
