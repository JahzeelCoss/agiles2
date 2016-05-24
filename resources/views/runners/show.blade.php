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
                    <h4><span class="">{!! $data['user']->first_name !!} 
                    	{!! $data['user']->last_name !!}</span></h4>                   
                   
                </div>
                <div class="divider"></div>
                
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
	           	      
				
                
				<div>					
					@if($data['isTheUser'])
						<p class="row">
							{!! Form::open(array('url' => 'users/' . $data['user']->id, 'class' => 'pull-right' )) !!}
		                    {!! Form::hidden('_method', 'DELETE') !!}                   
							<small>{!! Form::submit('Eliminar mi cuenta', array('class' => 'btn btn-xs btn-danger',)) !!}	</small>
		                	{!! Form::close() !!} 	
						</p>
							                	 
						<p class="row">
							<small class="pull-right ">
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
	            <div class="related-post">
	                <h4>Carreras en las que he participado</h4>
	                <hr>
	                <div class="col-md-4 col-sm-4">
	                    <div class="rel-post">
	                        <a href="#">
	                            <img src="{{ asset('dist/theme/images/blog/pic6.jpg') }}" alt="" lass="img-responsive">
	                            <div class="caption">
	                                <h4>Otra Carrera</h4>
	                               <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
	                            </div>
	                        </a>
	                    </div>
	                </div>
	                <div class="col-md-4 col-sm-4">
	                    <div class="rel-post">
	                        <a href="#">
	                            <img src="{{ asset('dist/theme/images/blog/pic7.jpg') }}" alt="" lass="img-responsive">
	                            <div class="caption">
	                                <h4>Otra Carrera</h4>
	                                <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
	                            </div>
	                        </a>
	                    </div>
               		</div>
	                <div class="col-md-4 col-sm-4">
	                    <div class="rel-post">
	                        <a href="#">
	                            <img src="{{ asset('dist/theme/images/blog/pic8.jpg') }}" alt="" lass="img-responsive">
	                            <div class="caption">
	                                <h4>Otra Carrera</h4>
	                                <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
	                            </div>
	                        </a>
	                    </div>
	                </div>
            	</div>
	            <div class="clearfix">            	
	            </div>         		
           		       
        	</div>  <!-- blog footer end -->           
	    <!-- left blog part end -->
		</div>
	</section>


@stop