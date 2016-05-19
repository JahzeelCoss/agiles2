<header id="header" class="navbar-fixed-top main-nav navbar-inverse" role="navigation">
    	<div class="container">
    		<!-- <div class="row"> -->
                 <div class="navbar-header ">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{url('/home')}}">
                            <img src="{{ asset('dist/theme/images/yucarun.png') }}" alt="" class="img-responsive">
                        </a>
                 </div><!--Navbar header End-->
                 	<nav class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">                                        
                            {{-- <li>
                                <a href="{{url('/home')}}" data-scroll  class="active"> Inicio</a>
                            </li>   --}}                         
                            <li>
                               {{--  <form class="navbar-form navbar-left" role="search">                               
                                    <input type="text" class="form-control" placeholder="Carrera">                      
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>    --}}                         
                                                        
                                @if(Auth::check())
                                    @if(Entrust::hasRole('admin'))
                                        <a href="{{url('/users/allRepresentatives')}}" title="">Organizadores</a>
                                        <a href="{{url('/notifications')}}" title="">Notificaciones</a>
                                        <a href="{{url('/users/allRunners')}}" title="">Corredores</a>
                                    @else 
                                        @if(Entrust::hasRole('representative'))
                                            @if(Auth::user()->company)
                                                @if(Auth::user()->company->active)
                                                    <a href="{{url('/races')}}" title="">Mis Carreras</a>              
                                                    <a href="{{url('/sponsors')}}" title="">Patrocinadores</a>
                                                @else 
                                                    <a href="{{url('#')}}" title="">Aprobación Pediente</a> 
                                                @endif
                                            @else 
                                                 <a href="{{url('/companies/create')}}" title="">Agregar Empresa</a> 
                                            @endif
                                        @else
                                            <a href="{{url('')}}" title="">Mis Carreras</a>
                                        @endif                                        
                                    @endif                                                                        
                                    <a href="{{url('/users/'.Auth::user()->id)}}" title="">{!!Auth::user()->first_name!!}</a>    
                                    <a href="{{url('auth/logout')}}" title="">Cerrar Sesión</a>                                    
                                @else
                                    <a href="{{url('/auth/login')}}" data-scroll  >Iniciar Sesión </a> 
                                    <a href="{{url('/auth/register')}}" data-scroll  >Registrarme </a>    
                                @endif    

                    @if(Entrust::hasRole('representative'))
                        @if(Auth::user()->company && Auth::user()->company->active)
                            <form method="POST" action="/search/searchRace">
                                {!! csrf_field() !!}
                                <div class="col-xs-8">                  

                                    <div class="form-group">
                                      {!! Form::text('name', old('name'), array('class'=>'form-control', 'placeholder'=>'Ingrese la carrera',
                                        'id'=>'name')) !!} 
                                    </div>
                                    
                                </div>                         
                                <div class="col-xs-4">
                                    <button type="submit" class="btn btn-default">Buscar</button>
                                </div>                        
                            </form>  
                        @endif                        
                    @else 
                         <form method="POST" action="/search/searchRace">
                            {!! csrf_field() !!}
                            <div class="col-xs-8">                  

                                <div class="form-group">
                                  {!! Form::text('name', old('name'), array('class'=>'form-control', 'placeholder'=>'Ingrese la carrera',
                                    'id'=>'name')) !!} 
                                </div>
                                
                            </div>                         
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-default">Buscar</button>
                            </div>                        
                          </form>                              
                    @endif
                                         	
                            </li>
                        </ul>
                     </nav>
                </div><!-- /.container-fluid -->
</header>