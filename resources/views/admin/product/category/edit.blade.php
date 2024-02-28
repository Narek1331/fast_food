@extends('adminlte::page')

@section('title', 'Dashboard')

{{-- @section('content_header')
    <h1>Dashboard</h1>
@stop --}}

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            {{ __('main.Edit category') }}
        </h3>
    </div>
    <form action="{{ route('admin.product.category.update',['id' => $category['id']]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            @foreach ($category->languages as $lang)

            <div class="form-group">
                <label for="Input{{ $lang->code }}">{{ $lang->code }} {{ __('main.Variant') }}</label>
                <input type="text" class="form-control" id="Input{{ $lang->code }}" placeholder="Enter {{ $lang->code }}" name="{{ $lang->code }}" value="{{ $lang->name }}">
                @error($lang->code)
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
