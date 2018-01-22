@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                
                <div class="panel-body">
                    @if (count($errors) > 0)
                    <div class="center-margin text-center alert-danger alert">
                      @if($errors->first('throttle'))
                      {{$errors->first('throttle')}}
                      @else
                    Incorrect Username / Password!!
                      @endif
                  </div>
                  @endif

                  <form class="" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input class="form-control" placeholder="Username" name="username" type="text" value="{{ old('username') }}" required autofocus>

                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">

                    </div>

                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-lg btn-success btn-block">
                        Login
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                    <!-- Change this to a button or input when using this as a form -->


                </form>
            </div>
        </div>
    </div>
</div>
</div>



@endsection
