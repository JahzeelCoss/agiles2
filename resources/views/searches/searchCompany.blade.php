@extends('layouts.base')
@section('body')
<br><br><br><br><br><br>
	<section id="port-content">
		
		<div class="container">
	        <div class="row"><!--  título -->
	            <div class="col-md-12 col-sm-12 col-xs-12">
	                <div class="feature_header text-center">                  
	                    <h3 class="feature_title"><b>Buscar Compañias</b></h3>                                     
	                  <div class="divider"></div>
	                </div>
	            </div>
	            <br><br><br>
	            <div class="col-sm-10 col-sm-offset-1">		

				<form method="POST" class="">
					{!! csrf_field() !!}
	            	<div class="col-xs-8">	            		

				        <div class="form-group">
				          {!! Form::text('name', old('name'), array('class'=>'form-control', 'placeholder'=>'Ingrese la compañia',
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
							<th>Eliminar</th>							

						</tr>
					</thead>
					<tbody>
					@if(isset($data))
						@if(!empty($data['companies']) && isset($data['companies']))
						@foreach ($data['companies'] as $company)
							<tr>
								<td>{!!$company->id!!}</td>
								<td>{!!$company->name!!}</td>
								<td>{!!$company->email!!}</td>
								<td>{!!$company->active!!}</td>
														
								<td>
								{!! Form::open(array('url' => 'companies/' . $company->id, 'class' => 'pull-right' )) !!}
			                    {!! Form::hidden('_method', 'DELETE') !!}                   
								<small>{!! Form::submit('Eliminar', array('class' => 'btn btn-xs btn-danger',)) !!}	</small>
			                	{!! Form::close() !!}  										          	
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