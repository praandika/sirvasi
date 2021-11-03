@extends('auth.auth-app')
@section('title','Confirm Password')

@section('login-content')
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html">{{ __('Confirm Password') }}}</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ __('Please confirm your password before continuing.') }}</p>

            <form action="{{ route('password.confirm') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Confirm Password') }}</button>
                    </div>
                    @if (Route::has('password.request'))
                    <div class="col-12">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                    @endif
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection
