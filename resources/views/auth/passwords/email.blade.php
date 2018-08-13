@extends('layouts.frontend.blank')

@section('title', 'Reset')

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

                    <form class="form" method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf
                        <div class="header header-danger text-center">
                            <h4 class="card-title">Reset Password</h4>
                        </div>
                        <div class="card-content">

                            <div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">email</i>
									</span>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email..." required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="footer text-center">

                            <button type="submit" class="btn btn-danger btn-raised btn-wd">
                                {{ __('Send Password Reset Link') }}
                            </button>

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
