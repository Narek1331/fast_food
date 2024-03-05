@extends('adminlte::page')

@section('title', __('main.Products'))

@section('content')
<br>
<div class="card">
    <div class="card-header">
    <h3 class="card-title">
        {{ __('main.List Ingredients') }}
    </h3>
    </div>

    <div class="card-body">
    <div class="text-center">
        <a class="btn" href="{{ route('admin.product.ingredient.create') }}">
            {{ __('main.Create new ingredient') }}
        </a>
    </div>
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
    <thead>
    <tr>
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID">ID</th>
        @foreach ($languages as $num => $lang)
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="{{$lang->name}} {{ __('main.Name') }}: activate to sort column ascending">{{$lang->name}} {{ __('main.name') }}</th>
        @endforeach
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID">
            {{ __('main.Action') }}
        </th>

    </tr>
    </thead>
    <tbody>
        @foreach ($ingredients as $num => $data)
        <tr class="odd">

            <td class="dtr-control sorting_1" tabindex="{{ $num }}">{{ $data->id }}</td>
            @foreach($data->languages as $lang)
                <td>{{ $lang->name ?? '-' }}</td>

            @endforeach
            <td>
                <div class="d-flex ">
                    <form method="POST" action="{{ route('admin.product.ingredient.destroy',['id'=>$data['id']]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn" title="{{ __('main.Delete') }}">
                            <i class="fas fa-trash text-danger"></i>
                        </button>
                    </form>
                    <a class="btn"  href="{{ route('admin.product.ingredient.edit', ['id' => $data['id']]) }}" title="{{ __('main.Edit') }}">
                        <i class="fas fa-edit text-warning"></i>
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
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"> {{ __('main.Total count') }}: {{$ingredients->total()}}</div>
    </div>
    <div class="col-sm-12 col-md-7">
        {{$ingredients->links()}}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
