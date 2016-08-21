@extends('index')

@section('content')
  <div class="wrapper">
    <div class="form-signin">       
      <h2 class="form-signin-heading">Please login</h2>
            
            
            {!! Form::open(array('url' => 'auth/login')) !!}
                <div class="form-group">
                    {!! Form::email('email', $value = null, array('class' => 'form-control', 'placeholder' => 'Email')) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Wachtwoord')) !!}
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Login </button>                    
                </div>
            {!! Form::close() !!}
 </div>
  </div>
    <div class="text-center signuplink">
        <span class="white-font">Nog geen account?</span> <a style="margin-left: 0px;" class="register" href="register">Registreer</a>
    </div>

@endsection