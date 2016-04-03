@extends('layouts.base')
@section('body')
<br><br><br><br><br><br><br>
<section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        @if ($errors->has())
            <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                {!! $error !!}<br>
              @endforeach
            </div>
          @endif
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Información De la Carrera</h3>
          </div><!-- /.box-header -->         
            <div class="box-body">            
              @if(isset($data['Race']))
              {!!Form::model($data['Race'], array('url'=>'races/'.$data['Race']->id, 'method'=>'PUT'))!!}
              @else
              {!!Form::open(array('url' => 'races'))!!}
              @endif
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <label for="name">Nombre</label>
                {!! Form::text('name', old('name'), array('class'=>'form-control', 'placeholder'=>'Nombre',
                  'required'=>'true', 'id'=>'name')) !!} 

                <label for="description">Descripción</label>
                {!! Form::text('description', old('description'), array('class'=>'form-control', 'placeholder'=>'Descripción',
                  'required'=>'true', 'id'=>'description')) !!} 

                <label for="contact_info">Contacto</label>
                {!! Form::text('contact_info', old('contact_info'), array('class'=>'form-control', 'placeholder'=>'Contacto',
                  'required'=>'true', 'id'=>'contact_info')) !!} 

                <label for="distance">Distancia</label>
                {!! Form::text('distance', old('distance'), array('class'=>'form-control', 'placeholder'=>'Distancia',
                  'required'=>'true', 'id'=>'distance')) !!} 

                <label for="fee">Precio</label>
                {!! Form::text('fee', old('fee'), array('class'=>'form-control', 'placeholder'=>'Precio',
                  'required'=>'true', 'id'=>'fee')) !!}

                <label for="capacity">Capacidad</label>
                {!! Form::text('capacity', old('capacity'), array('class'=>'form-control', 'placeholder'=>'Capacidad',
                  'required'=>'true', 'id'=>'capacity')) !!}

                <label for="start_place">Lugar de Inicio</label>
                {!! Form::text('start_place', old('start_place'), array('class'=>'form-control', 'placeholder'=>'Inicio',
                  'required'=>'true', 'id'=>'start_place')) !!}
                  
                  <label for="finish_place">Lugar Final</label>
                {!! Form::text('finish_place', old('finish_place'), array('class'=>'form-control', 'placeholder'=>'Final',
                  'required'=>'true', 'id'=>'finish_place')) !!}                                                     

                               
            </div><!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">
                  @if(isset($project))
                    Editar
                  @else
                    Crear
                  @endif               
                </button>
              </div>
            {!! Form::close() !!}    
        </div><!-- /.box -->   
      </div><!-- left column -->  
    </section>
@stop