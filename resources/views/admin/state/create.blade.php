@extends('adminlte::page')
@section('title', __('main.Create New State'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ __('main.Create New State') }}</h1>
            <form action="{{ route('admin.state.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('main.Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('main.Name') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('main.Save') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
