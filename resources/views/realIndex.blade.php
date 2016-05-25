@extends('layouts.base')
@section('body')

<!-- Slider start -->
    <section id="slider_part">
         <div class="carousel slide" id="carousel-example-generic" data-ride="carousel">
            <!-- Indicators -->
         	 <ol class="carousel-indicators text-center">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
             </ol>

           	<div class="carousel-inner">
           	 	<div class="item active">
           	 		<div class="overlay-slide">
           	 			<img src="{{ asset('uploads/carousel/1.jpg') }}" alt="" class="img-responsive">
           	 		</div>
           	 		<div class="carousel-caption">
               	 		<div class="col-md-12 col-xs-12 text-center">
                      <h2>YUCARUN</h2>
               	 			<h3 class="animated2"> <b>YUCARUN</b> YUCARUN </h3>
               	 			<div class="line"></div>
               	 			<p class="animated3">YUCARUN</p>
               	 		</div>
           	 		</div>
           	 	</div>
                <div class="item">
                    <div class="overlay-slide">
                        <img src="{{ asset('uploads/carousel/2.jpg') }}" alt="" class="img-responsive">
           	 		</div>
           	 		<div class="carousel-caption">
               	 		<div class="col-md-12 col-xs-12 text-center">
                    <h2>YUCARUN</h2>
               	 			<h3 class="animated3"> YUCARUN <b>YUCARUN </b>YUCARUN</h3>
               	 			<div class="line"></div>
               	 			<p class="animated2">YUCARUN YUCARUN YUCARUN</p>
               	 		</div>
           	 		</div>
           	 	</div>
           	 	<div class="item">
                    <div class="overlay-slide">
                        <img src="{{ asset('uploads/carousel/3.jpg') }}" alt="" class="img-responsive">
           	 		</div>
           	 		<div class="carousel-caption">
               	 		<div class="col-md-12 col-xs-12 text-center">
                    <h2>YUCARUN</h2>
               	 			<h3 class="animated3"> YUCARUN <b>YUCARUN</b></h3>
               	 			<div class="line"></div>
               	 			<p class="animated2"> YUCARUN</p>
               	 		</div>
           	 		</div>
           	 	</div>

           	 </div> 	 <!-- End Carousel Inner -->

            <!-- Controls -->
            <div class="slides-control ">
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                	<span><i class="fa fa-angle-left"></i></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                	<span><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </div>
  	</section>
    <!--/ Slider end -->


<div class="clearfix"></div>

<!-- bLOG Start -->
@if(Auth::user())
    @if(Auth::user()->hasRole('runner'))
        @if(Auth::user()->getRecommendedRaces()->count())
            @if(Auth::user()->getRecommendedRaces()->first() == null))
              
            @else
              <section id="blog">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="feature_header text-center">
                                <h3 class="feature_title"><b>Recomendaciones</b></h3>
                                <div class="divider"></div>
                            </div>
                        </div>  <!-- Col-md-12 End -->
                    </div>
                    <div class="row">
                        @foreach(Auth::user()->getRecommendedRaces() as $race)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="single_blog">
                                    <div class="post_img text-center">
                                       <a href="{{ URL::to('races/' . $race->id) }}"><img src="{{ asset('uploads/races/'.$race->image) }}" alt="" class="img-responsive"></a>
            {{--                            <div class="post-date">
                                            <span>25</span> 6
                                        </div> --}}
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
            @endif
           
        <!-- bLOG End -->
        @endif        
    @endif
@endif



<section id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title"><b>Carreras</b></h3>                    
                    <div class="divider"></div>
                </div>
            </div>  <!-- Col-md-12 End -->
        </div>
        <div class="row">
             <div class="blog-timeline">
                <div id="owl-blog" class="owl-carousel owl-theme">
                    
                    @foreach($races as $race)
                        <div class="item ">
                            <div class="single_blog">
                                <div class="post_img text-center">
                                   <a href="{{ URL::to('races/' . $race->id) }}"><img src="{{ asset('uploads/races/'.$race->image) }}" alt="" class="img-responsive"></a>
                                   {{--  <div class="post-date">
                                        <span>25</span> 6
                                    </div> --}}
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
            </div> <!-- blog Timeline End -->
        </div>
    </div>
</section>
<!-- bLOG End -->



@stop