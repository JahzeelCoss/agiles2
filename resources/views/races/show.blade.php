@extends('layouts.base')
@section('body')
	<br><br><br><br><br>
	<section id="blog-single">
        <div class="container">
            <!-- Portfolio item slider start -->
            <div class="col-lg-10 col-lg-offset-1 col-md-8 col-sm-12 col-xs-12">
                <div class="">
                    <li><img src="{{ asset('uploads/races/'.$data['race']->image) }}" alt="" class="img-responsive"/>

                    </li>
                </div>
                <div class="blog-desc">
                    <h4>{!! $data['race']->name !!}</h4>
                    <ul class="post-meta-links list-inline">
                        <li><a href="#"><span> <i class="fa fa-bookmark"></i></span>{!! $data['race']->company->name !!}</a></li>
                        <li><a href="#"> <span><i class="fa fa-calendar"></i></span>{!! $data['race']->race_date !!}</a></li>
                        <li><a href="#"> <span><i class="fa fa-users"></i></span>{!! $data['race']->current_inscriptions !!} /{!! $data['race']->capacity !!}  inscritos</a></li>
                    </ul>
                   <p>
                       {!! $data['race']->description !!}
                   </p>
                </div>
                <hr>
                <div class="clearfix">                	
                </div>
                <div class="tags1">
                    <p>Categoría: </p>
                    <a href="#">{!! $data['race']->category->name !!}</a>                 
                </div>                
	            <div class="clearfix">            	
	            </div>
            	<hr>
                 <div class="clearfix">                 
                </div>
                <div class="tags">
                    <p><span class="pull-left">Tipo:&nbsp;&nbsp;</span> 
                    <a href="#">{!! $data['race']->type->name !!}</a> 
                    </p>                      
                </div>                             
                <div class="clearfix">              
                </div>
                @if($data['race']->fee > 0)
	               	<hr>
	                 <div class="clearfix">                 
	                </div>
	                <div class="">
	                    <p><span class="pull-left"><strong>Precio:&nbsp;&nbsp;</strong></span> 
	                    	<button type="button" class="btn btn-primary text-center">Precio <span class="badge">${!! $data['race']->fee !!}</span></button>	                    	
	                    </p>                      
	                </div>                             
	                <div class="clearfix">              
	                </div>
                @endif
                <hr>	      
				<div class="">
                   <img src="{{ asset('uploads/races/routes/'.$data['race']->route) }}" alt="" class="img-responsive"/>		                   
                </div>
                @if($data['race']->Company->Sponsors->count())
                	<section id="port-content">
					    <div class="container">
					        <div class="row"><!--  título -->
					            <div class="col-md-8 col-md-offset-1 col-xm-12 col-xs-12">
					                <div class="feature_header">
					                    <h3 class="feature_title">Patrocinadores</h3>				                    
					                </div>
					            </div>                        
					        </div>
					        <div class="row">            
								<div id="owl-demo" class="owl-carousel owl-theme team-items">
									@foreach($data['race']->Company->Sponsors as $sponsor)
										<div class="item text-center">
						                    <div class="single-member">
						                        <div class="overlay-hover">
						                            <img src="{{ asset('uploads/sponsors/'.$sponsor->image) }}" alt="" class="img-responsive">                          
						                        </div>
						                        <h3>{!! $sponsor->name !!}</h3>                        
						                    </div>
						                </div>  <!-- item wrapper end -->
									@endforeach	                
						    	</div>			
					        </div>
					    </div>
					</section>  
                @endif
               
				<div>
					<div class="divider"></div>
					@if($data['hasPermission']) 					
	                	
						@if($data['race']->active)
							{!! Form::open(array('url' => 'races/' . $data['race']->id, 'class' => 'pull-right' )) !!}
	                    {!! Form::hidden('_method', 'DELETE') !!}                   
						<small>{!! Form::submit('Eliminar Esta Carrera', array('class' => 'btn btn-xs btn-danger',)) !!}	</small>
	                	{!! Form::close() !!} 
							<p class="row">
							<small class="pull-right ">
		                		<a class="btn btn-xs btn-warning" href="{{ url('/races/'.$data['race']->id.'/edit') }}">
		                			Editar Carrera
		                		</a>
		                	</small>
						</p> 
							{!! Form::open(array('url' => 'races/' . $data['race']->id . '/activate', 'class' => 'pull-right', 'action' => 'RaceController@activate' )) !!}           
					                  
							{!! Form::submit('Terminar Carrera', array('class' => 'btn btn-xs btn-danger',)) !!}	                   
					        {!! Form::close() !!} 
						@endif						
					@endif

					@if(!$data['race']->active)
						<span class="text-center"><h4>No puedes inscribirte a esta Carrera</h4></span>
					@else 
						@if($data['race']->inscriptions_closed)
							<span class="text-center"><h4>El Cupo de esta Carrera está lleno</h4></span>
						@else 
							@if($data['isRunner']) 
								@if ($data['isRunnerOnRace'])
									<span class="text-center"><h4>Ya estás inscrito a esta carrera!</h4></span>
								@else 
									@if($data['race']->fee > 0)
									<div class="text-center">
										<a href="{{ url('/races/'.$data['race']->id.'/payment') }}" class="btn btn-info">Inscribirme a la Carrera!</a>
									</div>										
									@else
										{!! Form::open(array('url' => 'races/' . $data['race']->id . '/registerRunner', 'class' => 'text-center', 'action' => 'RaceController@registerRunner' )) !!} 	     
										{!! Form::submit('Inscribirme a la Carrera!', array('class' => 'btn btn-xs btn-info',)) !!}	   
										                       
					                	{!! Form::close() !!}
									@endif									
								@endif						  
							@endif	
						@endif
					@endif
										
					
				</div>
				<br><br>
				
	            <div class="clearfix">            	
	            </div>         		
           		       
        	</div>  <!-- blog footer end -->           
	    <!-- left blog part end -->
		</div>
	</section>


@stop