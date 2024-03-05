@extends('adminlte::page')

@section('title', 'Dashboard')

{{-- @section('content_header')
    <h1>Dashboard</h1>
@stop --}}

@section('content')
<br>
<div class="card">
    <div class="card-body">
        @foreach ($languages as $lang)

        <div class="form-group">
            <label for="Input{{ $lang->name }}">{{ $lang->name }}</label>
            <input type="text" class="form-control" id="Input{{ $lang->name }}" placeholder="Enter {{ $lang->name }}">
        </div>
        @endforeach

    </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
