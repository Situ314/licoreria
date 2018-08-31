@extends('pagina_web.master_page')

@section('cuerpo')
<div class="check_out_page_area sp wow fadeIn">
<div class="container">
    <div class="col-md-5 col-md-offset-3"> 
        <div class="order_review">                        
            <ul class="order_details">
                <li class="order_header">Ingresar a tu cuenta</li>
                <li>
                <!--login-->
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                    <fieldset class='text-center login_web'>
                        <br><h2>Login</h2>
                      <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                          <center><input id="username" type="username" class="form-control" name="username" placeholder="Ingresar nombre de usuario" style="width: 90%;" value="{{ old('username') }}" required autofocus></center>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <center><input id="password" type="password" class="form-control" placeholder="Ingresar contraseña" style="width: 90%;" name="password" required></center>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class='text-center'>
                        <div class='checkbox'>
                          <label>
                              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
                          </label>
                        </div>
                        <button type="submit" class="btn ingreso_cliente">Ingresar</button>
                        <br>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Olvidaste tu contraseña?
                        </a>
                      </div>
                    </fieldset>
                  </form>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
@endsection
