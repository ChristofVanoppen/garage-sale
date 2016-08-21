@extends('index')

@section('content')
	<a class="plaatsproduct" href="/create">plaats product</a>


    <h1 class="text-center"><small>Alle Producten</small></h1>


	@foreach ($products as $product)
	  
    <div class="form-products"> 
		<li>Titel: {{ $product->title }}</li>
		<li>Prijs: {{ $product->price }}</li>
		<li>Beschrijving: {{ $product->description }}</li>
		<li>Categorie: {{ $product->category }}</li>
		 </div>
  
	@endforeach

@endsection