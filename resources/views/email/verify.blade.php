<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('mail.Confirm Email Address') }}</title>
    <!-- Bootstrap CSS -->
    {{-- <link href="/css/bootstrap.min.css" rel="stylesheet"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <p>{{ __('mail.Check that your phone number is correct') }} <strong>{{ $phone_number }}</strong></p>
                <h1>{{ __('mail.Please click the button below to confirm your email address') }}</h1>
                <a class="btn btn-primary" href="{{ $action }}">{{ __('mail.Confirm Email Address') }}</a>
            </div>
        </div>
    </div>
</body>
</html>
