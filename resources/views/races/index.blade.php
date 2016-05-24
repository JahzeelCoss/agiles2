@extends('layouts.base')
@section('body')
	
<br><br><br><br><br><br>

<section id="port-content">
    <div class="container">
        <div class="row"><!--  título -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title">Carreras De <b>{!! $data['company']->name !!}</b></h3>
                    <h4 class="feature_sub"><a href="{{ url('/races/create') }}" class="btn btn-info">Crear Carrera</a></h4>
                    <div class="divider"></div>
                </div>
            </div>                        
        </div>
        <div class="row">
            <br><br>
	            <div class="related-post">
	                <h4>Mis Carreras Actuales</h4>
	                <hr>
	                @if($data['openRaces'])
	                	@foreach($data['openRaces'] as $race) 
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
	                <h4>Mis Carreras Terminadas</h4>
	                <hr>
	                @if($data['closedRaces'])
	                	@foreach($data['closedRaces'] as $race) 
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
        </div>
    </div>
</section>  




@stop