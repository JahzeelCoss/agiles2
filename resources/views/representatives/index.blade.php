@extends('layouts.base')
@section('body')
<br><br><br><br><br><br>
	@if($user->Company)
		Nombre de la empresa: {!! $user->Company->name !!}
		@if ($user->company->active) 
			@if (true){{-- si tiene carreas --}}
			@else  {{-- si no tiene carreras --}}
			@endif	
		@else {{-- si aun no esta activada su cuenta --}}
		<br>
			Aun No ha sido Aprobada la empresa, Aun no puedes crear carreras
		@endif	
	@else		
		<section>
			Aun no tienes registrada una Empresa<br>
			<a href="{{ URL::to('companies/create') }}" >Registrar Empresa</a>	
		</section>		
	@endif
@stop