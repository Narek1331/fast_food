@extends('adminlte::page')

@section('title', __('main.Orders'))

@section('content')
<br>
<div class="card">
    <div class="card-header">
    <h3 class="card-title">
        {{ __('main.Orders') }}
    </h3>
    </div>

    <div class="card-body">
        <form action="">
            <div class="input-group input-group-sm" >
                <input type="text" class="form-control" name="q" placeholder="{{ __('main.Find order by order number') }}" value="{{ request()->has('q') ? request()->q : '' }}">
                <span class="input-group-append">
                <button type="submit" class="btn btn-info btn-flat">{{ __('main.Find') }}</button>
                </span>
            </div>
        </form>
        <br>
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
    <thead>
    <tr>
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID">{{ __('main.ID') }}</th>
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order Number">{{ __('main.Order Number') }}</th>
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order Number">{{ __('main.Status') }}</th>
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order Number">{{ __('main.Date') }}</th>
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name">{{ __('main.name') }}</th>
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Phone Number">{{ __('main.Phone Number') }}</th>
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Email">{{ __('main.email') }}</th>

        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Actions">
            {{ __('main.Action') }}
        </th>

    </tr>
    </thead>
    <tbody>
        @foreach ($orders as $num => $data)
        <tr class="odd">

            <td class="dtr-control sorting_1" tabindex="{{ $num }}">{{ $data->id }}</td>
            <td class="dtr-control sorting_1" tabindex="{{ $num }}">{{ $data->order_number }}</td>
            <td class="dtr-control sorting_1" tabindex="{{ $num }}">{{ __('main.'.$data->Status->name) }}</td>
            <td class="dtr-control sorting_1" tabindex="{{ $num }}">{{ $data->created_at }}</td>
            <td class="dtr-control sorting_1" tabindex="{{ $data->name }}">{{ $data->name }}</td>
            <td class="dtr-control sorting_1" tabindex="{{ $data->phone_number }}">{{ $data->phone_number }}</td>
            {{-- <td class="dtr-control sorting_1" tabindex="{{ $data->address }}">
                {{ $data->state->name }},{{ $data->settlement->name }},{{ $data->address }}
            </td> --}}
            <td class="dtr-control sorting_1" tabindex="{{ $data->name }}">{{ $data->email }}</td>

            <td>
                <div class="d-flex ">
                    <a class="btn"  href="{{ route('admin.order.show', ['id' => $data['id']]) }}" title="{{ __('main.Show') }}">
                        <i class="fas fa-eye text-warning"></i>
                    </a>
                </div>
            </td>

            {{-- <td>{{ $data->description }}</td> --}}
        </tr>

        @endforeach


    </tbody>

    </table>
</div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"> {{ __('main.Total count') }}: {{$orders->total()}}  </div>
    </div>
    <div class="col-sm-12 col-md-7">
        {{$orders->links()}}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
