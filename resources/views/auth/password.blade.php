@extends('index')

@section('content')


<a class="login-logo" href="/"><img src="{{asset('images/logoo.png')}}" alt="Logo"></a>
<div class="row login__photo">
    <div class="col-xs-0 col-sm-4 col-md-4 col-lg-4 "></div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 login__form__container ">
          
        <div class="col-md-12 col-xs-12 login__container login__content">
            <!--<h1>Login als klant en plaats je project.<br/><br /> <h3>Login als aannemer en ga opzoek naar opdrachten.</h3></h1>-->
            
            <!--<p class="login__social"><a href="https://www.facebook.com/workplacebe">Facebook</a><span class="login__circle">•</span><a href="#">Twitter</a><span class="login__circle">•</span><a href="#">Instagram</a>--></p>
        <div class="login__container login__form">
            <h4>Wachtwoord vergeten</h4><br>
             <form method="POST" action="/password/email">
                {!! csrf_field() !!}
               
                <div class="form-group">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Vul je email adres in">
                </div>

                <div>
                    <button class="btn btn-primary" type="submit">
                        Stuur mij de reset link
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-xs-0 col-sm-4 col-md-4 col-lg-4"></div>
    
</div>
<div class="text-center signuplink">
        <span class="white-font">Nog geen account?</span> <a style="margin-left: 0px;" class="register" href="/auth/register">Registreer</a><br>
        <span class="white-font">Heb je al een account?</span> <a style="margin-left: 0px;" class="register" href="/auth/login">Login</a>
    </div>
</div>
@endsection