@extends('adminlte::page')

@section('title', __('main.Product create'))

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            {{ __('main.Create new product') }}
        </h3>
    </div>
    <form action="{{ route('admin.product.category.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @foreach ($languages as $lang)

            <div class="form-group">
                    <label for="Input{{ $lang->name }}">{{ $lang->name }} {{ __('main.Variant') }}</label>
                    <input type="text" class="form-control" id="Input{{ $lang->name }}" placeholder="{{ __('main.Enter the name') }} {{ $lang->name }}" name="{{ $lang->name }}['name']">
                @error($lang->name)
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{-- <label for="Input{{ $lang->name }}">{{ $lang->name }} {{ __('main.Variant') }}</label> --}}
                <input type="text" class="form-control" id="Input{{ $lang->name }}" placeholder="{{ __('main.Enter the description') }} {{ $lang->name }}" name="{{ $lang->name }}">
            @error($lang->name)
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
            @endforeach
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
