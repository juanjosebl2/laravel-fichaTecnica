@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Incidencias</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-incidencia')
                        <a class="btn btn-warning" href="{{ route('incidencias.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Titulo</th>
                                    <th style="color:#fff;">Contenido</th>
                                    <th style="color:#fff;">Ejercicios asociado</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($incidencias as $incidencia)
                            <tr>
                                <td style="display: none;">{{ $incidencia->id }}</td>                                
                                <td>{{ $incidencia->titulo }}</td>
                                <td>{{ $incidencia->contenido }}</td>
                                <td>{{ $incidencia->ejercicios->titulo }}</td>
                                <td>
                                    <form action="{{ route('incidencias.destroy',$incidencia->id) }}" method="POST">                                        
                                        @can('editar-incidencia')
                                        <a class="btn btn-info" href="{{ route('incidencias.edit',$incidencia->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-incidencia')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $incidencias->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection