@extends('layouts.base')
@section('body')
	
<br><br><br><br><br><br>

<section id="port-content">
    <div class="container">
        <div class="row"><!--  título -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title">Carreras De <b>{!! $data['company']->name !!}</b></h3>
                    <h4 class="feature_sub"></h4>
                    <div class="divider"></div>
                </div>
            </div>                        
        </div>
        <div class="row">
            @foreach($data['races'] as $race)
            	<div class="col-lg-3 col-md-4 col-sm-6">
				    <div class="single_blog">
				        <div class="post_img text-center">
				           <a href="{{ URL::to('races/' . $race->id) }}"><img src="{{ asset('dist/theme/images/blog/pic3.jpg') }}" alt="" class="img-responsive"></a>
				            <div class="post-date">
				                <span>25</span> 6
				            </div>
				        </div>
				        <a href="{{ URL::to('races/' . $race->id) }}"><h4>{!! $race->name !!}</h4></a>
				        <ul class="list-inline">
				            <li> <i class="fa fa-bookmark"></i>  {!! $race->Company->name !!}</li>
				            <li> <i class="fa fa-users"></i> {!! $race->current_inscriptions !!}</li>
				        </ul>
				        <p>{!! $race->description !!}</p>
				    </div>
				</div>	
				
			@endforeach
        </div>
    </div>
</section>  




@stop