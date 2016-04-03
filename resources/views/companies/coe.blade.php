x@extends('layouts.base')
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
            <h3 class="box-title">Información De la Compañia</h3>
          </div><!-- /.box-header -->         
            <div class="box-body">            
              @if(isset($data['company']))
              {!!Form::model($data['company'], array('url'=>'companies/'.$data['company']->id, 'method'=>'PUT'))!!}
              @else
              {!!Form::open(array('url' => 'companies'))!!}
              @endif
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <label for="name">Nombre</label>
                {!! Form::text('name', old('name'), array('class'=>'form-control', 'placeholder'=>'Nombre',
                  'required'=>'true', 'id'=>'name')) !!} 

                  <label for="address">Dirección</label>
                {!! Form::text('address', old('address'), array('class'=>'form-control', 'placeholder'=>'Dirección',
                  'required'=>'true', 'id'=>'address')) !!} 
                  
                  <label for="email">Correo Electrónico</label>
                {!! Form::text('email', old('email'), array('class'=>'form-control', 'placeholder'=>'Correo Electrónico',
                  'required'=>'true', 'id'=>'email')) !!}                                                                    

                  <label for="contact_info">Información de Contacto</label>
                {!! Form::text('contact_info', old('contact_info'), array('class'=>'form-control', 'required'=>'true',
                 'id'=>'contact_info')) !!}                  
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