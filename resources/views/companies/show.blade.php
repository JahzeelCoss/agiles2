@extends('layouts.base')
@section('body')
	<br><br><br><br>
	<section id="blog-single">
        <div class="container">
            <!-- Portfolio item slider start -->
            <div class="col-sm-10 col-sm-offset-1">
               <br><br>
                <div class="text-center">
                	<h3 class="feature_title"><b>{!! $data['company']->name !!} </b></h3>
                </div>
                <div class="divider"></div>
                
                
				
				<div class="featured_content">
                	<h4>Correo Electrónico: </h4>
                	<h5>{!! $data['company']->email !!}</h5>
                </div>
				<hr>
                <div class="featured_content">
                	<h4>Información Adicional de Contacto: </h4>
                	<h5>{!! $data['company']->contact_info !!}</h5>
                </div>
				<hr>
                <div class="featured_content">
                	<h4>Direccion: </h4>
                	<h5>{!! $data['company']->address !!}</h5>
                </div>


                <div class="clearfix">                	
                </div>                           
	           	<hr>
                      
	           	<div class="divider"></div>
	           	      
				<br><br>
	            <div class="related-post">
	                <h4>Carreras Actuales</h4>
	                <hr>
	                @if($data['company']->OpenRaces())
	                	@foreach($data['company']->OpenRaces() as $race) 
		                	<div class="col-md-4 col-sm-4">
			                    <div class="rel-post">
			                        <a href="{{ URL::to('races/' . $race->id) }}">
			                            <img src="{{ asset('uploads/races/'.$race->image) }}" alt="" lass="img-responsive">
			                            <div class="caption">
			                                <h4>{!! $race->name !!}</h4>
			                               <p>{!! $race->description !!}</p>
			                            </div>
			                        </a>
			                    </div>
		               		</div>
		                @endforeach	 
	                @endif	                               
            	</div>
	            <div class="clearfix">            	
	            </div>
	             <br><br>
	            <div class="related-post">
	                <h4>Carreras Terminadas</h4>
	                <hr>
	                @if($data['company']->ClosedRaces())
	                	@foreach($data['company']->ClosedRaces() as $race) 
		                	<div class="col-md-4 col-sm-4">
			                    <div class="rel-post">
			                        <a href="{{ URL::to('races/' . $race->id) }}">
			                            <img src="{{ asset('uploads/races/'.$race->image) }}" alt="" lass="img-responsive">
			                            <div class="caption">
			                                <h4>{!! $race->name !!}</h4>
			                               <p>{!! $race->description !!}</p>
			                            </div>
			                        </a>
			                    </div>
		               		</div>
		                @endforeach
	                @endif	                	                
            	</div>
	            <div class="clearfix">            	
	            </div>          		
           		       
        	</div>  <!-- blog footer end -->           
	    <!-- left blog part end -->
		</div>
	</section>


@stop