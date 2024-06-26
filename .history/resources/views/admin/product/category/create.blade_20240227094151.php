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
            {{ __('Create new category') }}
        </h3>
    </div>
    <form action="{{ route('admin.product.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @foreach ($languages as $lang)

            <div class="form-group">
                <label for="Input{{ $lang->name }}">{{ $lang->name }} {{ __('Variant') }}</label>
                <input type="text" class="form-control" id="Input{{ $lang->name }}" placeholder="Enter {{ $lang->name }}" name="{{ $lang->id }}">

            </div>

            @endforeach
            <span class="invalid-feedback" role="alert">
                <strong>1ssss</strong>
            </span>
            <div class="text-center">
                <button class="btn btn-primary">
                    {{ __('Save') }}
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
    <script> console.log('Hi!'); </script>
@stop
