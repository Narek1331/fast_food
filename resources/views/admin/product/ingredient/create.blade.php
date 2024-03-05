@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            {{ __('main.Create new ingredient') }}
        </h3>
    </div>
    <form action="{{ route('admin.product.ingredient.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @foreach ($languages as $lang)

            <div class="form-group">
                    <label for="Input{{ $lang->name }}"> {{ __('main.Enter the name') . ' '. __('main.'.$lang->name) }}</label>
                    <input type="text" class="form-control" id="Input{{ $lang->name }}" placeholder="{{ __('main.Enter the name') . ' '. __('main.'.$lang->name) }}" name="{{ $lang->name }}[name]">
                @error($lang->name .'.name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            @endforeach

        </div>
        <div class="text-center">
                <button class="btn btn-primary">
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
@stop
