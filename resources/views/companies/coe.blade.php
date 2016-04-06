@extends('layouts.base')
@section('body')
<br><br><br><br><br><br>


  <section id="port-content">
    <div class="container">
        <div class="row"><!--  título -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title">Registrar <b>Empresa</b></h3>
                    <h4 class="feature_sub">Añada la Información de su Empresa</h4>
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
              @if(isset($data['company']))
              {!!Form::model($data['company'], array('url'=>'companies/'.$data['company']->id, 'method'=>'PUT'))!!}
              @else
              {!!Form::open(array('url' => 'companies'))!!}
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
                      {!! Form::text('address', old('address'), array('class'=>'form-control', 'placeholder'=>'Dirección','required'=>'true', 'id'=>'address')) !!}                   
                      <span class="form-icon fa fa-home"></span>
                    </div> 
                     <div class="form-level">
                      {!! Form::text('email', old('email'), array('class'=>'form-control', 'placeholder'=>'Correo Electrónico','required'=>'true', 'id'=>'email')) !!}
                        <span class="form-icon fa fa-envelope"></span>
                    </div>                                                                                            
                  </div>
                </div>
                
                <div class="col-md-6 right">                   
                    <div class="form-level">
                       {!! Form::textarea('contact_info', old('contact_info'), array('class'=>'form-control', 'placeholder'=>'Información de Contacto', 'required'=>'true','id'=>'contact_info', 'rows' => '5')) !!}    
                      <span class="form-icon fa fa-info-circle"></span>
                    </div>                          
                </div>
                <div class="col-md-12 text-center">
                     <button class="btn btn-main featured" type="submit">Registrar</button>
                </div>                        
              </form>   
            </div>
        </div>
    </div>
  </section>  

@stop