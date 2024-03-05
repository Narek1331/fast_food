@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            {{ __('main.Edit ingredient') }}
        </h3>
    </div>
    <form action="{{ route('admin.product.ingredient.update',['id'=>$ingredient['id']]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            @foreach ($ingredient->languages as $lang)
            
            <div class="form-group">
                    <label for="Input{{ $lang->code }}"> {{ __('main.Enter the name') . ' '. __('main.'.$lang->code) }}</label>
                    <input type="text" class="form-control" id="Input{{ $lang->code }}" placeholder="{{ __('main.Enter the name') . ' '. __('main.'.$lang->name) }}" name="{{ $lang->code }}[name]" value="{{ $lang->name }}">
                @error($lang->code .'.name')
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
