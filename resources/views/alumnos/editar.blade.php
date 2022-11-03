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

                       {!! Form::model($alumno, ['method' => 'PATCH','route' => ['alumnos.update', $alumno->id]]) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">DNI del Alumno:</label>      
                                {!! Form::text('dni', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Apellido y Nombre del Alumno:</label>      
                                {!! Form::text('apellidoynombre', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Matricula Profecional:</label>      
                                {!! Form::text('matricula', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Matriculado del CPAPC:</label>      
                                {!! Form::text('matricula2', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Email:</label>      
                                {!! Form::text('correo', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Número de contacto:</label>      
                                {!! Form::text('numerocontacto', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                       <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="col-sm-4 col-md-6 pl-0 form-group">
                                <label>Comprobante de pago:</label>
                                <br>
                                <label
                                        class="image__file-upload btn btn-primary text-white"
                                        tabindex="2">Escoger
                                    <input type="file" name="comprobantepago" id="pfImage" class="d-none" accept="image/*">
                                </label>
                                @error('comprobantepago')<br>
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="col-sm-3 preview-image-video-container float-right mt-1">
                                <img id='edit_preview_photo'
                                     class="img-thumbnail user-img user-profile-img profilePicture"
                                     src="{{asset('$alumno->comprobantepago')}}"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        
                    </div>
                    {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection