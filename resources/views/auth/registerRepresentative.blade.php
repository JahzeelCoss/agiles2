@extends('layouts.base')
@section('body')
    <br><br><br><br><br><br>
    <section id="port-content">
        <div class="container">
            <div class="row"><!--  título -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="feature_header text-center">
                        <h3 class="feature_title"><b>Registrate</b></h3>
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
                    <form method="POST" action="/auth/register">
                        <div class="col-md-6 left">
                            <div class="left_contact">
                                {!! csrf_field() !!}
                                <div class="form-level">
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Nombre(s)">
                                    <span class="form-icon fa fa-user"></span>
                                </div>
                               <div class="form-level">
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Apellido(s)">
                                    <span class="form-icon fa fa-user"></span>
                                </div>
                                <div class="form-level">
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico">
                                    <span class="form-icon fa fa-envelope-o"></span>
                                </div>                           

                                                                                   
                            </div>
                        </div>
                        <div class="col-md-6 right">
                            <div class="form-level">
                                <input type="password" name="password" placeholder="Contraseña">
                                <span class="form-icon fa fa-lock"></span>
                            </div>
                            <div class="form-level">
                                <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña">
                                <span class="form-icon fa fa-lock"></span>
                            </div>                             

                             <input type="hidden" name="is_representative" value="true" />
                        </div>
                        <div class="col-md-12 text-center">
                             <button class="btn btn-main featured" type="submit">Registrarme</button>
                        </div>                        
                    </form>   
                </div>
            </div>
    
        </div>
    </section>    

@stop