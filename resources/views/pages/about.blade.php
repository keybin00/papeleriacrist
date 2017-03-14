<h1>About page</h1>

<!-- using blade -->
@foreach($people as $person)
	<li>{{$person}}</li>
@endforeach

@if (empty($people))
	There are no people
@else
	There are people
@endif

