@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>All States</h1>
            <a href="{{ route('admin.state.create') }}" class="btn btn-primary mb-3">Create New State</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($states as $state)
                    <tr>
                        <td>{{ $state->id }}</td>
                        <td>{{ $state->name }}</td>
                        <td>
                            <a href="{{ route('admin.state.edit', $state->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.state.destroy', $state->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
