@extends('main.layout')

@section('title', __('main.forgot_password') )

@section('content')

 <!-- Single Page Header start -->
 <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">{{ __('main.forgot_password') }}</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="/">{{ __('main.Home') }}</a></li>
        <li class="breadcrumb-item active text-white">{{ __('main.forgot_password') }}</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Registration Form Start -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('auth.forgot_password_save',['locale'=>app()->getLocale()]) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('main.email') }}</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="{{ __('main.Enter the email') }}">
                    @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('main.password') }}</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="{{ __('main.Enter the password') }}">
                    @error('password')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">{{ __('main.password_confirmation') }}</label>
                    <input type="password_confirmation" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="{{ __('main.Enter the password_confirmation') }}">
                    @error('password_confirmation')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">{{ __('main.Confirm') }}</button>

                    <a href="{{ route('auth.login',['locale'=>app()->getLocale()]) }}" class="btn">{{ __('main.Login') }}</a>

                    <a href="{{ route('auth.register',['locale'=>app()->getLocale()]) }}" class="btn">{{ __('main.Register') }}</a>
                </div>
            </form>
            <br>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</div>
<!-- Registration Form End -->

@endsection
