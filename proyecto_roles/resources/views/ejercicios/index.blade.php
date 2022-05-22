@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ejercicios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-ejercicio')
                        <a class="btn btn-warning" href="{{ route('ejercicios.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Titulo</th>
                                    <th style="color:#fff;">Contenido</th>
                                    <th style="color:#fff;">Proyecto asociado</th>  
                                    <th style="color:#fff;">Usuario asociado</th>                                      
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($ejercicios as $ejercicio)
                            <tr>
                                <td style="display: none;">{{ $ejercicio->id }}</td>                                
                                <td>{{ $ejercicio->titulo }}</td>
                                <td>{{ $ejercicio->contenido }}</td>

                                @if($ejercicio->proyectos)
                                <td>{{ $ejercicio->proyectos->titulo }}</td>
                                @else
                                <td></td>
                                @endif

                                @if($ejercicio->users)
                                <td>{{ $ejercicio->users->name }}</td>
                                @else
                                <td></td>
                                @endif

                                <td>
                                    <form action="{{ route('ejercicios.destroy',$ejercicio->id) }}" method="POST">                                        
                                        @can('editar-ejercicio')
                                        <a class="btn btn-info" href="{{ route('ejercicios.edit',$ejercicio->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-ejercicio')
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
                            {!! $ejercicios->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection