@extends('layouts.portal')
@section('content')
<!-- Main content -->
<div class="content-wrapper ">

  <!-- Simple login form -->
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <div class="panel panel-body login-form">
      <div class="text-center">
        <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
        <h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
      </div>

      <div class="form-group has-feedback has-feedback-left {{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
        <div class="form-control-feedback">
          <i class="icon-user text-muted"></i>
        </div>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group has-feedback has-feedback-left {{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <div class="form-control-feedback">
          <i class="icon-lock2 text-muted"></i>
        </div>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
          <div class="col-md-9 col-md-offset-3">
              <div class="checkbox styled" >
                  <label>
                      <input type="checkbox" name="remember"> Remember Me
                  </label>
              </div>
          </div>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
      </div>

      <div class="text-center">
        <a href="{{ url('/password/reset') }}">Forgot password?</a>
      </div>
    </div>
  </form>
  <!-- /simple login form -->

</div>
<!-- /main content -->
@endsection
