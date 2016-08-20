@extends('index')

@section('content')
	<a href="/create">plaats product</a>

	@foreach ($products as $product)
		<li>{{ $product->title }}</li>
		<li>{{ $product->price }}</li>
		<li>{{ $product->description }}</li>
		<li>{{ $product->category }}</li>
	@endforeach

@endsection