@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            {{ __('main.Create new size') }}
        </h3>
    </div>
    <form action="{{ route('admin.product.size.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="InputName">{{ __('main.name') }}</label>
                <input type="text" class="form-control" id="InputName" placeholder="{{ __('main.Enter the name') }}" name="name">
                @error('name')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="text-center">
                <button class="btn btn-primary">
                    {{ __('main.Save') }}
                </button>
            </div>

        </div>
    </form>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
