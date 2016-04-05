@extends('layouts.base')
@section('body')
<br><br><br><br><br><br>

  <section id="port-content">
    <div class="container">
        <div class="row"><!--  título -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="feature_header text-center">
                  @if(isset($data['Race']))
                    <h3 class="feature_title">Editar <b>Carrera</b></h3>
                    <h4 class="feature_sub"></h4>
                  @else
                    <h3 class="feature_title">Crear <b>Carrera</b></h3>
                    <h4 class="feature_sub">Añada la Información de la Carrera</h4>
                  @endif  
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
              @if(isset($data['Race']))
              {!!Form::model($data['Race'], array('url'=>'races/'.$data['Race']->id, 'method'=>'PUT'))!!}
              @else
              {!!Form::open(array('url' => 'races'))!!}
              @endif              
                <div class="col-md-6 left">
                  <div class="left_contact">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <div class="form-level">
                      {!! Form::text('name', old('name'), array('class'=>'form-control', 'placeholder'=>'Nombre',
                      'required'=>'true', 'id'=>'name')) !!} 
                        <span class="form-icon fa fa-user"></span>
                    </div>
                    <div class="form-level">
                      {!! Form::textarea('description', old('description'), array('class'=>'form-control', 'placeholder'=>'Descripción','required'=>'true', 'id'=>'description', 'rows' => '5')) !!}                   
                      <span class="form-icon fa fa-file-text"></span>
                    </div> 
                    <br>
                     <div class="form-level">
                      {!! Form::text('contact_info', old('contact_info'), array('class'=>'form-control', 'placeholder'=>'Contacto','required'=>'true', 'id'=>'contact_info')) !!}
                        <span class="form-icon fa fa-envelope"></span>
                    </div> 

                    <div class="form-level">
                      {!! Form::select('category', 
                      (['0' => 'Selecciona una Categoria'] + ['1' => 'Categoria 1'] + ['2' => 'Categoria 2']), 
                          null, 
                          ['class' => 'form-control']) !!}                      
                    </div> 
                    <br>  
                    <div class="form-level">
                      {!! Form::select('type', 
                      (['0' => 'Selecciona un Tipo'] + ['1' => 'Tipo 1'] + ['2' => 'Tipo 2']), 
                          null, 
                          ['class' => 'form-control']) !!}                      
                    </div>                     
                  </div>
                </div>
                  <div class="col-md-6 right">  
                     <div class="form-level">
                      {!! Form::text('distance', old('distance'), array('class'=>'form-control', 'placeholder'=>'Distancia','required'=>'true', 'id'=>'distance')) !!}
                        <span class="form-icon fa fa-arrows-h"></span>
                    </div>                 
                    <div class="form-level">
                      {!! Form::text('fee', old('fee'), array('class'=>'form-control', 'placeholder'=>'Precio',
                      'required'=>'true', 'id'=>'fee')) !!}   
                      <span class="form-icon fa fa-dollar"></span>
                    </div>                             
                    <div class="form-level">
                      {!! Form::text('capacity', old('capacity'), array('class'=>'form-control', 'placeholder'=>'Capacidad','required'=>'true', 'id'=>'capacity')) !!}  
                      <span class="form-icon fa fa-plus-circle"></span>
                    </div> 
                    <div class="form-level">
                      {!! Form::text('start_place', old('start_place'), array('class'=>'form-control', 'placeholder'=>'Inicio','required'=>'true', 'id'=>'start_place')) !!}   
                      <span class="form-icon fa fa-arrow-circle-up"></span>
                    </div> 
                    <div class="form-level">
                      {!! Form::text('finish_place', old('finish_place'), array('class'=>'form-control', 'placeholder'=>'Final','required'=>'true', 'id'=>'finish_place')) !!}
                      <span class="form-icon fa fa-arrow-circle-down"></span>
                    </div>                     
                     
                </div>
                <div class="col-md-12 text-center">
                  @if(isset($data['Race']))
                    <button class="btn btn-main featured" type="submit">Editar</button>
                  @else
                    <button class="btn btn-main featured" type="submit">Registrarme</button>
                  @endif 
                  <br><br><br> 
                </div>                        
              </form>   
            </div>
        </div>
    </div>
  </section>  


@stop