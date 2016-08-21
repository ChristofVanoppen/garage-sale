@extends('index')

@section('content')
	


 <h1 class="text-center"><small>Alle Producten</small></h1>
 <div class="form-products"> 
 @if(Session::has('message'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ Session::get('message') }}</p>
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   				 <p>{{ $error }}</p>
            @endforeach
    </div>
@endif

@if($products->count())
	@foreach ($products as $product)
	  
   
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

		@if($product->userId == $user->id)
		<a href="modify/{{$product->id}}">Bewerk</a>
		<a href="remove/{{$product->id}}">Verwijder</a>
		@endif
	
  
	@endforeach
@else
	<div class="row">
		<div class="col-md-12 col-sm-4 col-xs-4" style='text-align:center;'>Er zijn nog geen producten.</div>
	</div>		
@endif
</div>
@endsection