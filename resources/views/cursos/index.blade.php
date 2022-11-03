@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Cursos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
        
                        @can('crear-curso')
                        <a class="btn btn-warning" href="{{ route('cursos.create') }}">Nuevo</a>                        
                        @endcan
        
                
                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                                       
                                    <th style="color:#fff;">Cursos</th>
                                    <th style="color:#fff;">Descripcion</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>  
                                <tbody>
                                @foreach ($cursos as $curso)
                                <tr>                           
                                    <td>{{ $curso->titulo}}</td>                                    
                                    <td>{{ $curso->descripcion}}</td>
                                    <td>     

                                     <!-- can para verificar si un usuario tiene cierto permiso -->     
                                                         
                                        @can('editar-curso')  
                                            <a class="btn btn-primary" href="{{ route('cursos.edit',$curso->id) }}">Editar</a>
                                        @endcan
                                        
                                        @can('borrar-curso')
                                            {!! Form::open(['method' => 'DELETE','route' => ['cursos.destroy', $curso->id],'style'=>'display:inline']) !!}
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
                                {!! $cursos->links() !!} 
                            </div>                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection