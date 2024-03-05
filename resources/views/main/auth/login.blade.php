@extends('main.layout')

@section('title', __('main.Login') )

@section('content')

 <!-- Single Page Header start -->
 <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">{{ __('main.Login') }}</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="/">{{ __('main.Home') }}</a></li>
        <li class="breadcrumb-item active text-white">{{ __('main.Login') }}</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Registration Form Start -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('auth.signin',['locale'=>app()->getLocale()]) }}" method="POST">
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
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">{{ __('main.log in') }}</button>

                    <a href="{{ route('auth.register',['locale'=>app()->getLocale()]) }}" class="btn">{{ __('main.Register page') }}</a>

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
