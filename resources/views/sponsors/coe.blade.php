@extends('layouts.base')
@section('body')
<br><br><br><br><br><br>

  <section id="port-content">
    <div class="container">
        <div class="row"><!--  título -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="feature_header text-center">
                  @if(isset($data['Race']))
                    <h3 class="feature_title">Editar <b>Patrocinador</b></h3>
                    <h4 class="feature_sub"></h4>
                  @else
                    <h3 class="feature_title">Añadir <b>Patrocinador</b></h3>
                    <h4 class="feature_sub">Añada la Información del Patrocinador</h4>
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
            <div class="contact_full ">
              @if(isset($data['sponsor']))
              {!!Form::model($data['sponsor'], array('url'=>'sponsors/'.$data['sponsor']->id, 'method'=>'PUT', 'files'=>true))!!}
              @else
              {!!Form::open(array('url' => 'sponsors', 'files'=>true))!!}
              @endif              
                <div class="col-md-8 col-md-offset-2 text-center">  
                   <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <div class="form-level">
                      {!! Form::text('name', old('name'), array('class'=>'form-control', 'placeholder'=>'Nombre',
                      'required'=>'true', 'id'=>'name')) !!} 
                        <span class="form-icon fa fa-user"></span>
                    </div>
                  <br>
                  {!! Form::file('image') !!}                                                     
                            
                     
                </div>

                <div class="col-md-12 text-center">
                   <br><br>
                  @if(isset($data['sponsor']))
                    <button class="btn btn-main featured" type="submit">Editar</button>
                  @else
                    <button class="btn btn-main featured" type="submit">Añadir Patrocinador</button>
                  @endif 
                  <br><br><br> 
                </div>                        
              </form>   
            </div>
        </div>
    </div>
  </section>  

  

@stop