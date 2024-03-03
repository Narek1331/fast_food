@extends('adminlte::page')

@section('title', __('main.Add user'))

@section('content_header')
    {{-- <h1>{{ __('main.Change password') }}</h1> --}}
@stop

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('main.Add user') }}</h3>
    </div>
    <form method="POST" action="{{ route('admin.save_add_user') }}">
    <div class="card-body">
        @csrf

        <div class="form-group">
            <label>{{ __('main.Select role') }}</label>
            <select class="form-control" name="role_id">
                @foreach ($roles as $role)
                    <option value="{{ $role['id'] }}">{{ __('main.' . $role['name']) }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nameInp">{{ __('main.name') }}</label>
            <input type="text" class="form-control" id="nameInp" placeholder="{{ __('main.Enter') . ' ' . __('main.name') }}" name="name">
                @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="nameInp">{{ __('main.email') }}</label>
            <input type="email" class="form-control" id="nameInp" placeholder="{{ __('main.Enter') . ' ' . __('main.email') }}" name="email">
                @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="oldPass">{{ __('main.password') }}</label>
            <input type="password" class="form-control" id="oldPass" placeholder="{{ __('main.Enter') . ' ' . __('main.password') }}" name="password">
                @error('password')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="Repeat">{{ __('main.Repeat password') }}</label>
            <input type="password" class="form-control" id="Repeat" placeholder="{{ __('main.Enter') . ' ' . __('main.Repeat password') }}" name="password_confirmation">
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
