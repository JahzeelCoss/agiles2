@extends("layouts.base")
@section("body")
<br><br><br><br><br><br>
	
	<section id="port-content">
	    <div class="container">
	        <div class="row"><!--  título -->
	            <div class="col-md-12 col-sm-12 col-xs-12">
	                <div class="feature_header text-center">                  
	                    <h3 class="feature_title"><b>Corredores</b></h3>                                     
	                  <div class="divider"></div>
	                </div>
	            </div>
	            @if (count($errors) > 0)
	                <div class="alert alert-danger">
	                    Han habido problemas con sus datos.<br><br>
	                    <ul>
	                        @foreach ($errors->all() as $error)
	                            <li>{{ $error }}</li>
	                        @endforeach
	                    </ul>
	                </div>
	            @endif               
	        </div>
	        <div class="row">
				<div>
					

					<table class="table table-condensed table-striped table-hover">
						<thead>
							<tr>
								<th>Id</th>								
								<th>Nombre(s)</th>
								<th>Apellidos(s)</th>	
								<th>Email</th>													
								<th>Eliminar</th>										
							</tr>
						</thead>
						<tbody>
						@if(!empty($users) && isset($users))
							@foreach ($users as $user)
								<tr>
									<td>{!!$user->id!!}</td>
									<td>{!!$user->first_name!!}</td>
									<td>{!!$user->last_name!!}</td>
									<td>{!!$user->email!!}</td>
									<td><a href="{{ URL::to('users/' . $user->id) }}" class="btn btn-info">
											<span><i class="fa fa-search-plus"></i></span>
										</a>
									</td>									
									<td>
									{!! Form::open(array('url' => 'users/' . $user->id, 'class' => 'pull-right' )) !!}
				                    {!! Form::hidden('_method', 'DELETE') !!}                   
									<small>{!! Form::submit('Eliminar', array('class' => 'btn btn-xs btn-danger',)) !!}	</small>
				                	{!! Form::close() !!}  										          	
									</td>
								</tr>
							@endforeach
						@endif
						</tbody>
					</table>


					
				</div>
	        </div>
	    </div>
	</section>

@stop 