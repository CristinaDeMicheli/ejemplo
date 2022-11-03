@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Alumnos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
        
                        @can('crear-alumno')
                        <a class="btn btn-warning" href="{{ route('alumnos.create') }}">Nuevo</a>                        
                        @endcan
        
                
                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                                       
                                    
                                    <th style="color:#fff;">DNI</th>
                                    <th style="color:#fff;">Apellido y Nombre</th>
                                    <th style="color:#fff;">Matricula</th>
                                    <th style="color:#fff;">Correo</th>
                                    <th style="color:#fff;">Numero Contacto</th>
                                      <th style="color:#fff;">Comprobante</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>  
                                <tbody>
                                @foreach ($alumnos as $alumno)
                                <tr>                           
                                    <td>{{ $alumno->dni}}</td>                                    
                                    <td>{{ $alumno->apellidoynombre}}</td>
                                    <td>{{ $alumno->matricula}}</td>
                                    <td>{{ $alumno->correo}}</td>
                                    <td>{{ $alumno->numerocontacto}}</td>
                                     <td>{{ $alumno->comprobantepago}}</td>
                                    <td>     

                                     <!-- can para verificar si un usuario tiene cierto permiso -->     
                                                         
                                        @can('editar-alumno')  
                                            <a class="btn btn-primary" href="{{ route('alumnos.edit',$alumno->id) }}">Editar</a>
                                        @endcan
                                        
                                        @can('borrar-alumno')
                                            {!! Form::open(['method' => 'DELETE','route' => ['alumnos.destroy', $alumno->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>               
                            </table>

                            <!-- Centramos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $alumnos->links() !!} 
                            </div>                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection