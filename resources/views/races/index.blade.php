@extends('layouts.base')
@section('body')
	
<br><br><br><br><br><br><br>
	@foreach($races as $race)
		{!! $race->name !!}
		<br>
	@endforeach
@stop