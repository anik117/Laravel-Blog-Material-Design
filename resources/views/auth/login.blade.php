@extends('layouts.frontend.blank')

@section('title', 'Login')

@push('css')
    <style>
        .card .footer {
            margin-bottom: 15px;
        }
    </style>
@endpush

@section('content')
    <div class="section-space"></div>
    <div class="section-space"></div>
    <div class="section-space"></div>
    <div class="section-space"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">

                    <form class="form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="header header-primary text-center">
                            <h4 class="card-title">Log in</h4>
                            <div class="social-line">
                                <a href="#pablo" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <p class="description text-center">Or Be Classical</p>
                        <div class="card-content">

                            <div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">email</i>
									</span>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email..." required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">lock_outline</i>
									</span>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password..." name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="form-check-input"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <div class="footer text-center">

                            <button type="submit" class="btn btn-primary btn-raised btn-wd">
                                {{ __('Login') }}
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="section-space"></div>
    <div class="section-space"></div>
@endsection

@push('js')
@endpush
