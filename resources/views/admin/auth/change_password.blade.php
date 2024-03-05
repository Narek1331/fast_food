@extends('adminlte::page')

@section('title', __('main.Change password'))

@section('content_header')
    {{-- <h1>{{ __('main.Change password') }}</h1> --}}
@stop

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('main.Change password') }}</h3>
    </div>
    <form method="POST" action="{{ route('admin.save_change_password') }}">
    <div class="card-body">
        @csrf

        <div class="form-group">
            <label for="oldPass">{{ __('main.Old password') }}</label>
            <input type="password" class="form-control" id="oldPass" placeholder="{{ __('main.Enter') . ' ' . __('main.Old password') }}" name="old_password">
                @error('old_password')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="oldPass">{{ __('main.New password') }}</label>
            <input type="password" class="form-control" id="oldPass" placeholder="{{ __('main.Enter') . ' ' . __('main.New password') }}" name="password">
                @error('password')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="oldPass">{{ __('main.Repeat new password') }}</label>
            <input type="password" class="form-control" id="oldPass" placeholder="{{ __('main.Enter') . ' ' . __('main.Repeat new password') }}" name="password_confirmation">
                @error('password_confirmation')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>



        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                {{ __('main.Save') }}
            </button>
        </div>
     </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
