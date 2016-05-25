@extends('layouts.base')
@section('body')
	<br><br><br><br>
	<section id="blog-single">
        <div class="container">
            <!-- Portfolio item slider start -->
            <div class="col-sm-10 col-sm-offset-1">
                <div class="feature_title">   
                	@if ($data['user']->profile_image)
                		<img src="{{ asset('uploads/users/'.$data['user']->profile_image) }}" alt="" class="img-responsive"/>
                	@endif             	                    
                </div>
                <div class="text-center">
                	 <div class="row">
		                <div class="col-md-12 col-sm-12 col-xs-12">
		                    <div class="feature_header text-center">
		                        <h3 class="feature_title"><b>{!! $data['user']->first_name !!} 
                    	{!! $data['user']->last_name !!}</b></h3>
		                        <div class="divider"></div>
		                    </div>
		                </div>  <!-- Col-md-12 End -->
		            </div>                                  
                   
                </div>                
                
                <div class="featured_content">
                    	<h5>Fecha de nacimiento: </h5>
                    	<h4>{!! $data["user"]->born_date !!}</h4>
                    </div>
                <div class="clearfix">                	
                </div>                           
	           	<hr>
				
				<div class="featured_content">
                    	<h5>Correo Electrónico: </h5>
                    	<h4>{!! $data["user"]->email !!}</h4>
                    </div>
                <div class="clearfix">                	
                </div>                           
	           	<hr>

	           	<div class="featured_content">
                    	<h5>Sexo: </h5>
                    	@if($data["user"]->gender)
                    		<h4>Hombre.</h4>
                    	@else 
                    		<h4>Mujer.</h4>
                    	@endif                    	
                    </div>
                <div class="clearfix">                	
                </div>                           
	           <hr>
                      
	           	<div class="divider"></div>
	           	      
				
                
				<div class="text-center">					
					@if($data['isTheUser'])
						<p class="row">
							{!! Form::open(array('url' => 'users/' . $data['user']->id)) !!}
		                    {!! Form::hidden('_method', 'DELETE') !!}                   
							<small>{!! Form::submit('Eliminar mi cuenta', array('class' => 'btn btn-xs btn-danger',)) !!}	</small>
		                	{!! Form::close() !!} 	
						</p>
							                	 
						<p class="row">
							<small class="">
		                		<a class="btn btn-xs btn-warning" href="{{ url('/users/'.$data['user']->id.'/edit') }}">
		                			Editar mi información
		                		</a>
		                	</small>
						</p>
	                	
					@else 
					@endif					
				</div>
				<div class="clearfix">                	
                </div> 
				<div class="divider"></div>	

				<br><br>	           
	            <div class="clearfix">            	
	            </div>         		
           		       
        	</div>  <!-- blog footer end -->           
	    <!-- left blog part end -->
		</div>
	</section>


@stop