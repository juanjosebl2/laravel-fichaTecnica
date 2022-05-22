@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Proyectos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-proyecto')
                        <a class="btn btn-warning" href="{{ route('proyectos.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Titulo</th>
                                    <th style="color:#fff;">Contenido</th>
                                    <th style="color:#fff;">Usuario relacionado</th>                                      
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($proyectos as $proyecto)
                            <tr>
                                <td style="display: none;">{{ $proyecto->id }}</td>                                
                                <td>{{ $proyecto->titulo }}</td>
                                <td>{{ $proyecto->contenido }}</td>

                                @if($proyecto->users)
                                <td>{{ $proyecto->users->name }}</td>
                                @else
                                <td></td>
                                @endif
   
                                <td>
                                    <form action="{{ route('proyectos.destroy',$proyecto->id) }}" method="POST">                                        
                                        @can('editar-proyecto')
                                        <a class="btn btn-info" href="{{ route('proyectos.edit',$proyecto->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-proyecto')
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
                            {!! $proyectos->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection