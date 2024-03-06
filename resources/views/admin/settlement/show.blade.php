@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>State Details</h1>
            <p><strong>ID:</strong> {{ $settlement->id }}</p>
            <p><strong>Name:</strong> {{ $settlement->name }}</p>
            <a href="{{ route('admin.settlement.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
