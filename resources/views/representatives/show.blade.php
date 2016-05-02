@extends('layouts.base')
@section('body')

	<section id="blog-single">
        <div class="container">
            <!-- Portfolio item slider start -->
            <div class="col-sm-10 col-sm-offset-1">
               <br><br>
                <div class="text-center">
                    <h4><span class="">{!! $data['user']->first_name !!} 
                    	{!! $data['user']->last_name !!}</span></h4>                   
                   
                </div>
                <div class="divider"></div>
                
                
				
				<div class="featured_content">
                    	<h5>Correo Electrónico: </h5>
                    	<h4>{!! $data["user"]->email !!}</h4>
                    </div>
                <div class="clearfix">                	
                </div>                           
	           	<hr>
                      
	           	<div class="divider"></div>
	           	      
				
                
				<div>					
					@if($data['isTheUser'])
						{!! Form::open(array('url' => 'users/' . $data['user']->id, 'class' => 'pull-right' )) !!}
	                    {!! Form::hidden('_method', 'DELETE') !!}                   
						<small>{!! Form::submit('Eliminar mi cuenta', array('class' => 'btn btn-xs btn-danger',)) !!}	</small>
	                	{!! Form::close() !!} 						
	                	
					@else 
					@endif					
				</div>
				<div class="clearfix">                	
                </div> 
				<div class="divider"></div>	

				<br><br>
	            <div class="related-post">
	                <h4>Mis Carreras Actuales</h4>
	                <hr>
	                @foreach($data['openRaces'] as $race) 
	                	<div class="col-md-4 col-sm-4">
		                    <div class="rel-post">
		                        <a href="#">
		                            <img src="{{ asset('uploads/races/'.$race->image) }}" alt="" lass="img-responsive">
		                            <div class="caption">
		                                <h4>{!! $race->name !!}</h4>
		                               <p>{!! $race->description !!}</p>
		                            </div>
		                        </a>
		                    </div>
	               		</div>
	                @endforeach	                
            	</div>
	            <div class="clearfix">            	
	            </div>
	             <br><br>
	            <div class="related-post">
	                <h4>Mis Carreras Terminadas</h4>
	                <hr>
	                @foreach($data['closedRaces'] as $race) 
	                	<div class="col-md-4 col-sm-4">
		                    <div class="rel-post">
		                        <a href="#">
		                            <img src="{{ asset('uploads/races/'.$race->image) }}" alt="" lass="img-responsive">
		                            <div class="caption">
		                                <h4>{!! $race->name !!}</h4>
		                               <p>{!! $race->description !!}</p>
		                            </div>
		                        </a>
		                    </div>
	               		</div>
	                @endforeach	                
            	</div>
	            <div class="clearfix">            	
	            </div>          		
           		       
        	</div>  <!-- blog footer end -->           
	    <!-- left blog part end -->
		</div>
	</section>


@stop