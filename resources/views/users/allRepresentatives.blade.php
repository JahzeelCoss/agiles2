@extends("layouts.base")
@section("body")
<br><br><br><br><br><br><br>

	@foreach($users as $user)
		{!! $user->first_name !!}
		<br>
	@endforeach

@stop