@extends('adminlte::page')

@section('title', 'Dashboard')

{{-- @section('content_header')
    <h1>Dashboard</h1>
@stop --}}

@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Different Height</h3>
    </div>
    <div class="card-body">
    <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg">
    <br>
    <input class="form-control" type="text" placeholder="Default input">
    <br>
    <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">
    </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
