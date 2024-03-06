@extends('adminlte::page')

@section('title', __('main.Edit Settlement'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ __('main.Edit Settlement') }}</h1>
            <form action="{{ route('admin.settlement.update', $settlement->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('main.Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $settlement->name }}" required>
                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('main.State') }}</label>
                        <select class="form-control" name="state_id">
                            @foreach($states as $state)
                                <option value="{{ $state['id'] }}" @if($state['id'] == $settlement['state_id']) selected @endif>{{ $state['name'] }}</option>
                            @endforeach
                        </select>
                    @error('state_id')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('main.Save') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
