@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Create New State</h1>
            <form action="{{ route('admin.state.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter state name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
