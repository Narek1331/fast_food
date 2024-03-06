@extends('adminlte::page')

@section('title', __('main.Customers'))

@section('content')
<br>
<div class="card">
    <div class="card-header">
    <h3 class="card-title">
        {{ __('main.Customers') }}
    </h3>
    </div>

    <div class="card-body">
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
    <thead>
    <tr>
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID">ID</th>
        <th>{{ __('main.Name') }}</th>
        <th>{{ __('main.email') }}</th>
        <th>{{ __('main.Phone Number') }}</th>
        <th>{{ __('main.Date') }}</th>

    </tr>
    </thead>
    <tbody>

        @foreach ($users as $user)
        <tr class="odd">

            <td class="dtr-control sorting_1" tabindex="{{ $user->id }}">{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>{{ $user->created_at }}</td>
        </tr>

        @endforeach

    </tbody>

    </table>
</div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"> {{ __('main.Total count') }}: {{ $users->total() }}</div>
    </div>
    <div class="col-sm-12 col-md-7">
        {{ $users->links() }}

    </div>
</div>
</div>
    </div>

    </div>

@stop

@section('css')
@stop

@section('js')
@stop
