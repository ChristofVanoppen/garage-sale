@extends('index')

@section('content')


<a class="login-logo" href="/"><img src="{{asset('images/logoo.png')}}" alt="Logo"></a>
<div class="row register__photo">

    <div class="col-md-4"></div>
    <div class="col-xs-12 col-md-4 login__form__container ">
        <div class="col-md-12 col-xs-12 login__container login__content">
            <!--<h1>Registreer je nu en plaats gratis je opdrachten.</h1><br/><br/><h3>Kom snel en makkelijk in contact met de beste vakman voor jouw project.</h3>-->
           <!-- <p class="login__social"><a href="#">Facebook</a><span class="login__circle">•</span><a href="#">Twitter</a><span class="login__circle">•</span><a href="#">Instagram</a></p>-->
             <!-- <div class="col-md-3"></div>-->
            <div class="col-md-12 col-xs-12 login__container login__form">
            <h4>Registreer</h4><br>
            
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            
            {!! Form::open(array('url' => 'auth/register')) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    {!! Form::text('firstname', $value = null, array('class' => 'form-control', 'placeholder' => 'Voornaam')) !!}
                </div>
                 <div class="form-group">
                    {!! Form::text('lastname', $value = null, array('class' => 'form-control', 'placeholder' => 'Achternaam')) !!}
                </div>
                <div class="form-group">
                    {!! Form::email('email', $value = null, array('class' => 'form-control', 'placeholder' => 'Email')) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Wachtwoord')) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Wachtwoord bevestigen')) !!}
                </div>
                <div class="form-group button__margin">
                    <button class="btn btn-primary" type="submit">Registreer </button>
                </div>
            {!! Form::close() !!}
        </div>
            <div class="col-md-3"></div>
    </div>
    </div>
    <div class="text-center signuplink">
        <span class="white-font">Je hebt al een account?</span> <a style="margin-left: 0px;" class="register" href="login">Login</a>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection