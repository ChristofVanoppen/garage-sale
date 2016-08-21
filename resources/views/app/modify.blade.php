@extends('index')

@section('content')
  <div class="wrapper">
    <div class="form-signin">       
      <h1 class="text-center"><small>Bewerk dit product</small></h1>
            
  	{!! Form::open(array('url' => 'modify/'.$product->id)) !!}
        <div class="form-group">
            {!! Form::text('title',$product->title, array('class' => 'form-control', 'placeholder' => 'titel')) !!}
        </div>
        <div class="form-group">
           {!! Form::input('number', 'price', $product->price, ['class' => 'form-control', 'placeholder' => 'prijs']) !!}
        </div>
        <div class="form-group">
            {!! Form::text('description',$product->description, array('class' => 'form-control', 'placeholder' => 'beschrijving')) !!}
        </div>
       	<div class="form-group">
            {!! Form::text('category',$product->category, array('class' => 'form-control', 'placeholder' => 'categorie')) !!}
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Update product</button>                    
        </div>
    {!! Form::close() !!}
 </div>
  </div>

@endsection