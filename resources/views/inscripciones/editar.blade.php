@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Inscripcion</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                <strong>¡Revise los campos!</strong>
                                @foreach ($errors->all() as $error)
                                <span class="badge badge-danger">{{$error}}</span>span>
                                @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            @endif

                               <form action="{{ route('inscripciones.update',$inscripcione->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Usuarios</label>
                                    <select name="user_id" id="user_id">
                                    <option value="{{ $inscripcione->user->id }}">{{ $inscripcione->user->name }}</option>
                                    
                                        @foreach($usuarios as $user)
                                           <option value={{ $user->id}}>{{ $user->name}}</option>  
                                       @endforeach 
                
                                    </select>
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Cursos</label>
                                    <select name="curso_id" id="curso_id">
                                         <option value="{{ $inscripcione->curso->id }}">{{ $inscripcione->curso->titulo }}</option>
                                        @foreach($cursos as $curs)

                                            <option value={{$curs->id}}>{{$curs->titulo}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>

                       </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
