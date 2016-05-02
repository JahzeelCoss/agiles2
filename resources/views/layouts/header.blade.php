<header id="header" class="navbar-fixed-top main-nav navbar-inverse" role="navigation">
    	<div class="container">
    		<!-- <div class="row"> -->
                 <div class="navbar-header ">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img src="{{ asset('dist/theme/images/yucarun.png') }}" alt="" class="img-responsive">
                        </a>
                 </div><!--Navbar header End-->
                 	<nav class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active">
                                <a href="index.html#slider_part" data-scroll  class="active">Home </a>
                            </li>                           
                            <li>
                                @if(Auth::User())
                                    <a href="{{url('/users/'.Auth::user()->id)}}" title="">{!!Auth::user()->first_name!!}</a>
                                @else
                                    <a href="{{url('/auth/login')}}" data-scroll  >Login </a>   
                                @endif                            	
                            </li>
                        </ul>
                     </nav>
                </div><!-- /.container-fluid -->
</header>