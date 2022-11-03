@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Inscripciones</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Inscripciones</h3>
                            <a class="btn btn-warning" href="{{ route('inscripciones.create') }}">Nuevo</a> 
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777;">
                                    <th style="display: none;">ID</th>
                                    <th style="color: #fff;">usuario</th>
                                    <th style="color: #fff;">curso</th>
                                    <th style="color: #fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($inscripciones as $inscripcione)
                                    <tr>
                                        <td style="display: none;">{{$inscripcione->id}}</td>
                                        <td>{{ $inscripcione->user->name}}</td> 
                                        <td>{{ $inscripcione->curso->titulo}}</td> 
                                         
                                     <td>                                  
                                      <a class="btn btn-info" href="{{ route('inscripciones.edit',$inscripcione->id) }}">Editar</a>

                                      {!! Form::open(['method' => 'DELETE','route' => ['inscripciones.destroy', $inscripcione->id],'style'=>'display:inline']) !!}
                                          {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                      {!! Form::close() !!}
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Centramos la paginacion a la derecha -->
                          <div class="pagination justify-content-end">
                            {!! $inscripciones->links() !!}
                          </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection