@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit State</h1>
            <form action="{{ route('admin.state.update', $state->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $state->name }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
