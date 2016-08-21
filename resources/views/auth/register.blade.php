@extends('index')

@section('content')


  <div class="wrapper">
    <div class="form-signin">       
      <h2 class="form-signin-heading">Please Register</h2>
            
            
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
  </div>
    <div class="text-center signuplink">
        <span class="white-font">Je hebt al een account?</span> <a style="margin-left: 0px;" class="register" href="login">Login</a>
    </div>

</div>
@endsection