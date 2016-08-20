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
            <h4>Wachtwoord Veranderen</h4><br>
            <form method="POST" action="/password/reset">
                {!! csrf_field() !!}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Vul je email adres in">
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Vul je nieuw wachtwoord in">
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Bevestig je nieuw wachtwoord">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">
                        Wachtwoord bevsitigen
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-xs-0 col-sm-4 col-md-4 col-lg-4"></div>
    
</div>
@endsection