@extends('index')

@section('content')
	


    <h1 class="text-center"><small>Alle Producten</small></h1>


	@foreach ($products as $product)
	  
    <div class="form-products"> 
    	<div class="row">
    		<div class="col-md-4 col-sm-4 col-xs-4"></div>
    		<div class="col-md-4 col-sm-4 col-xs-4">
				<li class="titel">{{ $product->title }}</li>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4">
				<li class="prijs">{{ $product->price }} euro</li>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<li class="beschrijving">Beschrijving:<br> {{ $product->description }}</li>
			</div>
			<div class="col-md-12">
				<br><li class="categorie">Categorie: {{ $product->category }}</li>
			</div>
		</div>
	</div>
  
	@endforeach

@endsection