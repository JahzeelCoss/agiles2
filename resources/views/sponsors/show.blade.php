@extends('layouts.base')
@section('body')

	<section id="team">
    <div class="container">
        <div class="row">
            <div id="owl-demo" class="owl-carousel owl-theme team-items">
                <div class="item text-center">
                    <div class="single-member">
                        <div class="overlay-hover">
                            <img src="{{ asset('uploads/sponsors/'.$sponsor->image) }}" alt="" class="img-responsive">                          
                        </div>
                        <h3>{!! $sponsor->name !!}</h3>                        
                    </div>
                </div>  <!-- item wrapper end -->
                

            </div>
        </div>
    </div> <!-- Conatiner Team end -->
    <!-- </div> -->

  </section>  <!-- Section TEam End -->


@stop