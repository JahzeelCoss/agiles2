@extends('layouts.base')
@section('body')
<br><br><br><br><br><br>

	<section id="port-content">
	    <div class="container">
	        <div class="row"><!--  título -->
	            <div class="col-md-12 col-sm-12 col-xs-12">
	                <div class="feature_header text-center">                  
	                    <h3 class="feature_title"><b>Notificaciones</b></h3>                                     
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
								<th>Id de compañia</th>
								<th>Nombre</th>
								<th>Activar</th>
								<th>Rechazar</th>										
							</tr>
						</thead>
						<tbody>
						@if(!empty($notifications) && isset($notifications))
							@foreach ($notifications as $notification)
								<tr>
									<td>{!!$notification->id!!}</td>
									<td>{!!$notification->company_id!!}</td>
									<td><a href="{{ URL::to('companies/' . $notification->company_id) }}">{!!$notification->company->name!!}</a></td>
									
									<td>
										
										{!! Form::open(array('url' => 'companies/' . $notification->company_id . '/activate', 'class' => 'pull-right', 'action' => 'CompanyController@activate' )) !!}           
					                  
											{!! Form::submit('Activar', array('class' => 'btn btn-xs btn-danger',)) !!}	                   
					                	{!! Form::close() !!}
					                	{{-- <button data-id="{!!$user->id!!}" type="button" class="delete-user btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete-user">
											<span class="glyphicon glyphicon-plus"></span> Eliminar
										</button> --}}
									</td>
									<td>						
										{!! Form::open(array('url' => 'companies/' . $notification->company_id, 'class' => 'pull-right' )) !!}
					                    {!! Form::hidden('_method', 'DELETE') !!}                   
										{!! Form::submit('Rechazar', array('class' => 'btn btn-xs btn-danger',)) !!}		          
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