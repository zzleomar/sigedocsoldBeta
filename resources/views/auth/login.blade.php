
@extends('layouts.app')
@section('content')
<style type="text/css">
  .fondo{
    background-color: #000000 !important;
    background-image: url(image/disenio6.jpg);
  }
  .login-box{
    width: 480px;
    margin: 7% auto;
  }
  .form-horizontal .form-group{
    margin-right: 30px;
    margin-left: 30px;
  }
</style>

<div class="login-box  ">
    <div class="login-logo">
 
        
    </div>
    <div class="login-box-body">        <div>
            <div class=""> 
                <img src="{{asset('/image/banner7.jpg')}}" height="120" width="400"/>
          </div>
        </div>
       <div class="login-logo"> <img src="{{asset('/image/logo-sistema13.jpg')}}" height="150" width="150"/> 
          <!--<a href="#"><b> Gestión de Documentos</b></a>-->
          </div>
        <p class="login-box-msg">Iniciar sesión</p>
        <div class="col-md-6">
            
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Recuerdame
                        </label>
                    </div>
                </div>
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        Iniciar sesión
                    </button>
                </div>
            </div>
        </form>
<!--        <a class="btn btn-link" href="{{ url('/password/reset') }}">
        ¿Olvidaste tu contraseña?
        </a>-->
    </div>
</div>
@endsection