@extends('index')

@section('content')
  


 <h1 class="text-center"><small>Mijn favorieten</small></h1>


@if($favorites->count())
  @foreach ($favorites as $favorite)
   <div class="form-products"> 
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4"></div>
        <div class="col-md-4 col-sm-4 col-xs-4">
        <li class="titel">{{ $favorite->product->title }}</li>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-4">
        <li class="prijs">{{ $favorite->product->price }} euro</li>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <li class="beschrijving">Beschrijving:<br> {{ $favorite->product->description }}</li>
      </div>
      <div class="col-md-12">
        <br><li class="categorie">Categorie: {{ $favorite->product->category }}</li>
      </div>
    </div>
  </div>   
  @endforeach
@else
  <div class="row">
    <div class="col-md-12 col-sm-4 col-xs-4" style='text-align:center;'>U hebt nog geen favorieten.</div>
  </div>    
@endif

@endsection