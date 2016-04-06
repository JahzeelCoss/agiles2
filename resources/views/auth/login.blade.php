

@extends('layouts.base')
@section('body')
    <br><br><br><br><br><br>
    <section id="port-content">
        <div class="container">
            <div class="row"><!--  título -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="feature_header text-center">
                        <h3 class="feature_title"><b>Inicia Sesión</b></h3>
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
                  <div class="col-sm-6 col-md-offset-3 text-center">
                    <div class="left_contact">
                        <form method="POST" action="/auth/login">
                          {!! csrf_field() !!}         
                          <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="Correo" name="email"  value="{{ old('email') }}" required="true">                                    
                          </div>
                          <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" required="true">                                   
                          </div>
                          <div class="row text-center">                                    
                            <div class="col-xs-4 col-xs-offset-4">
                              <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar</button>
                            </div><!-- /.col -->
                          </div>
                        </form>
                      </div>                                                      
                </div>
              </div>    
            </div>
    </section>    

@stop