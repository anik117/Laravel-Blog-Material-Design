@extends('layouts.frontend.blank')

@section('title', 'Register')

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

                    <form class="form" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                        <div class="header header-rose text-center">
                            <h4 class="card-title">Register</h4>
                        </div>

                        <div class="card-content">

                            <div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">tag_faces</i>
									</span>

                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">face</i>
									</span>

                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="User Name" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">email</i>
									</span>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>
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

                            <div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">lock_outline</i>
									</span>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required>

                            </div>

                        </div>

                        <div class="footer text-center">

                            <button type="submit" class="btn btn-rose btn-raised btn-wd">
                                {{ __('Register') }}
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
