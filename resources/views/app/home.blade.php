@extends('index')

@section('content')
<script>
	$("document").ready(function() {
		//token mismatch error fix
		$.ajaxSetup({
        	headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        	
   	 	});

		$(".addfav").click(function (e) {
			var prodId = $(this).data('product');
			var t=$(this);
			$.ajax({
                type: "POST",
                url: "/favorite",
                data: {id: prodId},
                success: function (data) {
                    t.html(data);
                }
            }, "json");

	            
	    });

	});
</script>


 <h1 class="text-center"><small>Alle Producten</small></h1>
 
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
		<div class="row">
			<div class="col-md-4">
		@if($product->favorite == 'no')
			<p class='addfav actieknoppen' data-product='{{ $product->id }}'>Volg</p>
				
		@else
			
			<p class='addfav actieknoppen' data-product='{{ $product->id }}'>Ontvolg</p>	
		@endif
			</div>
			<div class="col-md-4">
		@if($product->userId == $user->id)
		<a class="actieknoppen" href="modify/{{$product->id}}">Bewerk</a>
			</div>
			<div class="col-md-4">
		<a class="actieknoppen" href="remove/{{$product->id}}">Verwijder</a>
			</div>
		@endif
		</div>
 	</div>
	@endforeach
@else
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12" style='text-align:center;'>Er zijn nog geen producten.</div>
	</div>		
@endif

@endsection