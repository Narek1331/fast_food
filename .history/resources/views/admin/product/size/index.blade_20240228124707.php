@extends('adminlte::page')

@section('title', __('main.Products'))

@section('content')
<br>
<div class="card">
    <div class="card-header">
    <h3 class="card-title">
        {{ __('main.List Sizes') }}
    </h3>
    </div>

    <div class="card-body">
    <div class="text-center">
        <a class="btn" href="{{ route('admin.product.size.create') }}">
            {{ __('main.Create new size') }}
        </a>
    </div>
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
    <thead>
    <tr>
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID">{{ __('main.ID') }}</th>
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name">{{ __('main.name') }}</th>
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Actions">
            {{ __('main.Action') }}
        </th>

    </tr>
    </thead>
    <tbody>
        @foreach ($products as $num => $data)
        <tr class="odd">

            <td class="dtr-control sorting_1" tabindex="{{ $num }}">{{ $data->id }}</td>
            @foreach($data->languages as $lang)
                <td>{{ $lang->name ?? '-' }}</td>

            @endforeach
            <td>
                <div class="d-flex ">
                    <form method="POST" action="{{ route('admin.product.destroy',['id'=>$data['id']]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn" title="{{ __('main.Delete') }}">
                            <i class="fas fa-trash text-danger"></i>
                        </button>
                    </form>
                    <a class="btn"  href="{{ route('admin.product.edit', ['id' => $data['id']]) }}" title="{{ __('main.Edit') }}">
                        <i class="fas fa-edit text-warning"></i>
                    </a>
                    <a class="btn"  href="{{ route('admin.product.show', ['id' => $data['id']]) }}" title="{{ __('main.Show') }}">
                        <i class="fas fa-eye text-primary"></i>
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
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"> {{ __('main.Total count') }}: {{$products->total()}}</div>
    </div>
    <div class="col-sm-12 col-md-7">
        {{$products->links()}}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
