@extends('layouts.base')
@section('body')
<br><br><br><br><br><br>
	<section id="port-content">
		
		<div class="container">
	        <div class="row"><!--  título -->
	            <div class="col-md-12 col-sm-12 col-xs-12">
	                <div class="feature_header text-center">                  
	                    <h3 class="feature_title"><b>Buscar Carreras</b></h3>                                     
	                  <div class="divider"></div>
	                </div>
	            </div>
	            <br><br><br>
	            <div class="col-sm-10 col-sm-offset-1">		

				<form method="POST" action="/search/searchRace" class="">
					{!! csrf_field() !!}
	            	<div class="col-xs-8">	            		

				        <div class="form-group">
				          {!! Form::text('name', old('name'), array('class'=>'form-control', 'placeholder'=>'Ingrese la carrera',
                      		'id'=>'name')) !!} 
				        </div>
				        
	            	</div>	
	            	<div class="col-xs-4">
	            			<button type="submit" class="btn btn-default">Buscar</button>
				    	
	            	</div>	
					
				  </form>	


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
							<th>Nombre</th>
							<th>Compañia</th>	
							<th>Activa</th>													
							@if(isset($data) && $data['isTheUser'])
								<th>Eliminar</th>	
							@endif																
						</tr>
					</thead>
					<tbody>
					@if(isset($data) && $data['isTheUser'])
						@if(!empty($data['races']) && isset($data['races']))
						@foreach ($data['races'] as $race)
							<tr>
								<td>{!!$race->id!!}</td>
								<td>{!!$race->name!!}</td>
								<td>{!!$race->company->name!!}</td>
								<td>{!!$race->active!!}</td>
								<td>
									<a href="{{ URL::to('races/' . $race->id) }}" class="btn btn-info">
										<span><i class="fa fa-search-plus"></i></span>
									</a>
								</td>
								
								<td>
								{!! Form::open(array('url' => 'races/' . $race->id, 'class' => 'pull-right' )) !!}
			                    {!! Form::hidden('_method', 'DELETE') !!}                   
								<small>{!! Form::submit('Eliminar', array('class' => 'btn btn-xs btn-danger',)) !!}	</small>
			                	{!! Form::close() !!}  										          	
								</td>

							</tr>
						@endforeach
						@endif
					@else	
						@if(!empty($data['races']) && isset($data['races']))
						@foreach ($data['races'] as $race)
							<tr>
								<td>{!!$race->id!!}</td>
								<td>{!!$race->name!!}</td>
								<td>{!!$race->company->name!!}</td>
								<td>{!!$race->active!!}</td>
								<td>
									<a href="{{ URL::to('races/' . $race->id) }}" class="btn btn-info">
										<span><i class="fa fa-search-plus"></i></span>
									</a>
								</td>
								
								

							</tr>
						@endforeach
						@endif
					@endif
					
					</tbody>
				</table>				
			</div>
	    </div>
	</section>
@stop