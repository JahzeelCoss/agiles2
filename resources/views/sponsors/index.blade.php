@extends('layouts.base')
@section('body')
	
<br><br><br><br><br><br>

<section id="port-content">
    <div class="container">
        <div class="row"><!--  título -->
            <div class="col-md-8 col-md-offset-2 col-xm-12 col-xs-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title">Patrocinadores De <b>{!! $data['company']->name !!}</b></h3>
                    <h4 class="feature_sub"></h4>
                    <div class="divider"></div>
                </div>
            </div>                        
        </div>
        <div class="row">            
			<div id="owl-demo" class="owl-carousel owl-theme team-items">
				@foreach($data['sponsors'] as $sponsor)
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




@stop