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
    <form action="{{ route('admin.product.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="InputCategory">{{ __('main.Select the category')}}</label>
                <select class="custom-select form-control-border" id="InputCategory" name="category_id">
                    <option>Value 1</option>
                    <option>Value 2</option>
                    <option>Value 3</option>
                    </select>
                @error('category')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @foreach ($languages as $lang)

            <div class="form-group">
                    <label for="Input{{ $lang->name }}"> {{ __('main.Enter the name') . ' '. __('main.'.$lang->name) }}</label>
                    <input type="text" class="form-control" id="Input{{ $lang->name }}" placeholder="{{ __('main.Enter the name') . ' '. __('main.'.$lang->name) }}" name="{{ $lang->name }}['name']">
                @error($lang->name)
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="Input{{ $lang->name }}" placeholder="{{ __('main.Enter the description') . ' '. __('main.'.$lang->name) }}" name="{{ $lang->name }}['description']">
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
