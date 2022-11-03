@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Alumno</h3>
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
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif

                     <div class="container">
                        <div class="row">
                            <form action="{{route('alumnos.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="form-control">
                                    <label for="">DNI</label>
                                    <input type="text" name="dni">        
                                </div>
                                <div class="form-control">
                                    <label for="">APELLIDO Y NOMBRE</label>
                                    <input type="text" name="apellidoynombre">
                                </div>
                                <div class="form-control">
                                    <label for="">MATRICULA</label>
                                    <input type="text" name="matricula">
                                </div>
                                <div class="form-control">
                                    <label for="">MATRICULA2</label>
                                    <input type="text" name="matricula2">
                                </div>
                                <div class="form-control">
                                    <label for="">CORREO</label>
                                    <input type="text" name="correo">
                                </div>
                                <div class="form-control">
                                    <label for="">CONTACTO</label>
                                    <input type="text" name="contacto">
                                </div>
                                <div class="form-control">
                                    <label for="">COMPROBANTE</label>
                                    <input type="file" name="file">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </form>     
                        </div> 
                     </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection