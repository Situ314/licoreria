<!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Ingresar</title>
    {!! Html::style('css/application-a07755f5.css') !!}
    {!! Html::style('font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('css/bootstrap.css') !!}
    {!! Html::style('css/style.css') !!}
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body class='login'>
    <div class='wrapper'>
      <div class='row'>
        <div class='col-lg-12'>
          <div class='brand text-center'>
            <h1>
              <div class='logo-icon'>
                <i class='icon-beer'></i>
              </div>
              Licoreria
            </h1>
          </div>
        </div>
      </div>
      <div class='row'>
        <div class='col-lg-12'>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            <fieldset class='text-center'>
              <legend>Ingresa a tu cuenta</legend>
              <div class='form-group'>
                <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
              </div>
              <div class='form-group'>
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div class='text-center'>
                <div class='checkbox'>
                  <label>
                    <input type='checkbox'>
                    Recuerdame
                  </label>
                </div>
                <button type="submit" class="btn btn-default">Ingresar</button>
                <br>
                <a href="forgot_password.html">Olvidaste tu contraseña?</a>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
