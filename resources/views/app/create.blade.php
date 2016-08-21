@extends('index')

@section('content')
  <div class="wrapper">
    <div class="form-signin">       
      <h2 class="form-signin-heading">Maak product aan</h2>
            
  	{!! Form::open(array('url' => 'create')) !!}
        <div class="form-group">
            {!! Form::text('title','', array('class' => 'form-control', 'placeholder' => 'titel')) !!}
        </div>
        <div class="form-group">
           {!! Form::input('number', 'price', null, ['class' => 'form-control', 'placeholder' => 'prijs']) !!}
        </div>
        <div class="form-group">
            {!! Form::text('description','', array('class' => 'form-control', 'placeholder' => 'beschrijving')) !!}
        </div>
       	<div class="form-group">
            {!! Form::text('category','', array('class' => 'form-control', 'placeholder' => 'categorie')) !!}
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Plaats product </button>                    
        </div>
    {!! Form::close() !!}
 </div>
  </div>
      <div class="text-center signuplink">
        <span class="white-font">Bekijk producten</span> <a style="margin-left: 0px;" class="register" href="home">Klik hier</a>
    </div>
@endsection