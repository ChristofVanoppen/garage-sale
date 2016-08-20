@extends('index')

@section('content')

  	{!! Form::open(array('url' => 'create')) !!}
        <div class="form-group">
            {!! Form::text('title','', array('class' => 'form-control', 'placeholder' => 'titel')) !!}
        </div>
        <div class="form-group">
           {!! Form::input('number', 'price', null, ['class' => 'form-control', 'placeholder' => '0']) !!}
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

@endsection