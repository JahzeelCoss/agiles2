@extends('layouts.base')
@section('body')
<br><br><br><br><br><br>

    <section id="port-content">
        <div class="container">
            <div class="row"><!--  título -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="feature_header text-center">
                        <h3 class="feature_title"><b>Editar mi información</b></h3>
                        <h4 class="feature_sub"></h4>
                        <div class="divider"></div>
                    </div>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        Han habido problemas con sus datos.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif               
            </div>
            <div class="row">
                <div class="contact_full">
                     {!!Form::model($user, array('url'=>'users/'.$user->id, 'method'=>'PUT', 'files'=>true))!!}
                        <div class="col-md-6 left">
                            {!! csrf_field() !!}
                            <div class="left_contact">
                                <div class="form-level">
                                  {!! Form::text('first_name', old('first_name'), array('class'=>'form-control', 'placeholder'=>'Nombre(s)',
                                  'required'=>'true', 'id'=>'first_name')) !!} 
                                    <span class="form-icon fa fa-user"></span>
                                </div>
                                <div class="form-level">
                                  {!! Form::text('last_name', old('last_name'), array('class'=>'form-control', 'placeholder'=>'Apellido(s)',
                                  'required'=>'true', 'id'=>'last_name')) !!} 
                                    <span class="form-icon fa fa-user"></span>
                                </div>
                                <div class="form-level">
                                  {!! Form::text('email', old('email'), array('class'=>'form-control', 'placeholder'=>'',
                                  'required'=>'true', 'id'=>'email')) !!} 
                                    <span class="form-icon fa fa-user"></span>
                                </div>  
                                <div class="form-level">
                                <br>
                                <span class="">Género</span>
                                <div class="col-xs-offset-3">
                                    <select  class="form-control" name="gender">
                                        @if($user->gender)
                                            <option value="0">Mujer</option>
                                            <option value="1" selected>Hombre</option>
                                        @else 
                                            <option value="0" selected>Mujer</option>
                                            <option value="1">Hombre</option>
                                        @endif                                                                    
                                    </select>       
                                </div>
                            </div>                              

                            </div>
                        </div>
                        <div class="col-md-6 right">                            
                            <label for="projectname">Fecha de Nacimiento</label>
                              {!! Form::date('born_date', null, array('class'=>'form-control','id'=>'born_date', 'required'=>'true')) !!}  
                            <br>                            
                              <label for="profile_image">Imagen de la carrera</label>
                              {!! Form::file('profile_image') !!}                           
                            <br>
                            <div class="form-level">
                                <input type="password" name="password" placeholder="Contraseña">
                                <span class="form-icon fa fa-lock"></span>
                            </div>
                            <div class="form-level">
                                <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña">
                                <span class="form-icon fa fa-lock"></span>
                            </div>   
                        </div>
                        <div class="col-md-12 text-center">
                           <br><br>                         
                            <button class="btn btn-main featured" type="submit">Editar</button>                         
                          <br><br><br> 
                        </div>     
                    </div>
                    </form>
                </div>
            </div>
    
        </div>
    </section>

@stop