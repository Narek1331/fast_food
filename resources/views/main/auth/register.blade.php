@extends('main.layout')

@section('title', __('main.Register') )

@section('content')

 <!-- Single Page Header start -->
 <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">{{ __('main.Register') }}</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('home',['locale'=>app()->getLocale()]) }}">{{ __('main.Home') }}</a></li>
        <li class="breadcrumb-item active text-white">{{ __('main.Register') }}</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Registration Form Start -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('auth.signup',['locale'=>app()->getLocale()]) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('main.Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="{{ __('main.Enter the name') }}">
                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

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
                    <label for="phone_number" class="form-label">{{ __('main.Phone Number') }}</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" required placeholder="{{ __('main.Enter the phone number') }}" value="+374">
                    @error('phone_number')
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
                    <button type="submit" class="btn btn-primary">{{ __('main.Register') }}</button>

                    <a href="{{ route('auth.login',['locale'=>app()->getLocale()]) }}" class="btn">{{ __('main.Login') }}</a>

                    <a href="{{ route('auth.forgot_password',['locale'=>app()->getLocale()]) }}" class="btn">{{ __('main.forgot_password') }}</a>

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
