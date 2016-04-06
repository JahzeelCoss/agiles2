@extends('layouts.base')
@section('body')

	<section id="blog-single">
        <div class="container">
            <!-- Portfolio item slider start -->
            <div class="col-lg-10 col-lg-offset-1 col-md-8 col-sm-12 col-xs-12">
                <div class="">
                    <li><img src="{{ asset('uploads/races/'.$race->image) }}" alt="" class="img-responsive"/>

                    </li>
                </div>
                <div class="blog-desc">
                    <h4>{!! $race->name !!}</h4>
                    <ul class="post-meta-links list-inline">
                        <li><a href="#"><span> <i class="fa fa-bookmark"></i></span>{!! $race->company->name !!}</a></li>
                        <li><a href="#"> <span><i class="fa fa-calendar"></i></span>{!! $race->race_date !!}</a></li>
                        <li><a href="#"> <span><i class="fa fa-users"></i></span>{!! $race->current_inscriptions !!} /{!! $race->capacity !!}  inscritos</a></li>
                    </ul>
                   <p>
                       {!! $race->description !!}
                   </p>
                </div>
                <hr>
                <div class="clearfix">                	
                </div>
                <div class="tags1">
                    <p>Categoría: </p>
                    <a href="#">{!! $race->category->name !!}</a>                 
                </div>                
	            <div class="clearfix">            	
	            </div>
            	<hr>
                 <div class="clearfix">                 
                </div>
                <div class="tags">
                    <p><span class="pull-left">Tipo:&nbsp;&nbsp;</span> 
                    <a href="#">{!! $race->type->name !!}</a> 
                    </p>                      
                </div>                             
                <div class="clearfix">              
                </div>
                <hr>	      
				<div class="">
                   <img src="{{ asset('uploads/races/routes/'.$race->route) }}" alt="" class="img-responsive"/>		                   
                </div>
                <section id="port-content">
				    <div class="container">
				        <div class="row"><!--  título -->
				            <div class="col-md-8 col-md-offset-1 col-xm-12 col-xs-12">
				                <div class="feature_header">
				                    <h3 class="feature_title">Patrocinadores</h3>				                    
				                    <div class="divider"></div>
				                </div>
				            </div>                        
				        </div>
				        <div class="row">            
							<div id="owl-demo" class="owl-carousel owl-theme team-items">
								@foreach($race->Company->Sponsors as $sponsor)
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
				<div>
					{!! Form::open(array('url' => 'races/' . $race->id, 'class' => 'pull-right' )) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}                   
					<small>{!! Form::submit('Eliminar Esta Carrera', array('class' => 'btn btn-xs btn-danger',)) !!}	</small>
                	{!! Form::close() !!}   
					
				</div>
				<br><br>
	            <div class="related-post">
	                <h4>Otras Carreras</h4>
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