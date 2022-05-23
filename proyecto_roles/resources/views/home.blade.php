@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                                <div class="row">

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-green order-card">
                                            <div class="card-block">
                                            <h5>Roles</h5>                                               
                                                @php
                                                use Spatie\Permission\Models\Role;
                                                 $cant_roles = Role::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-user-lock f-left"></i><span>{{$cant_roles}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>     
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-blue order-card">
                                            <div class="card-block">
                                            <h5>Usuarios</h5>                                               
                                                @php
                                                 use App\Models\User;
                                                $cant_usuarios = User::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a></p>
                                            </div>                                            
                                        </div>                                    
                                    </div>
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Proyectos</h5>                                               
                                                @php
                                                 use App\Models\Proyecto;
                                                $cant_proyectos = Proyecto::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_proyectos}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/proyectos" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-purple order-card">
                                            <div class="card-block">
                                                <h5>Ejercicios</h5>                                               
                                                @php
                                                 use App\Models\Ejercicio;
                                                $cant_ejercicios = Ejercicio::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_ejercicios}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/ejercicios" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-yellow order-card">
                                            <div class="card-block">
                                                <h5>Incidencias</h5>                                               
                                                @php
                                                 use App\Models\Incidencia;
                                                $cant_incidencias = Incidencia::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_incidencias}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/incidencias" class="text-white">Ver más</a></p>
                                            </div>
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
