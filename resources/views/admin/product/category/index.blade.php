@extends('adminlte::page')

@section('title', __('main.List categories'))

{{-- @section('content_header')
    <h1>Dashboard</h1>
@stop --}}

@section('content')
<br>
<div class="card">
    <div class="card-header">
    <h3 class="card-title">
        {{ __('main.List categories') }}
    </h3>
    </div>

    <div class="card-body">
    <div class="text-center">
        <a class="btn" href="{{ route('admin.product.category.create') }}">
            {{ __('main.Create new category') }}
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

        @foreach ($categories as $num => $category)
        <tr class="odd">

            <td class="dtr-control sorting_1" tabindex="{{ $num }}">{{ $category->id }}</td>
            @foreach($category->languages as $lang)
                <td>{{ $lang->name ?? 1 }}</td>

            @endforeach
            <td>
                <div class="d-flex justify-content-between">
                    <form method="POST" action="{{ route('admin.product.category.destroy',['id'=>$category['id']]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            {{ __('main.Delete') }}
                        </button>
                    </form>
                    <a class="btn btn-primary"  href="{{ route('admin.product.category.edit', ['id' => $category['id']]) }}">
                        {{ __('main.Edit') }}
                    </a>
                </div>
            </td>

            {{-- <td>{{ $category->description }}</td> --}}
        </tr>

        @endforeach

    </tbody>

    </table>
</div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"> {{ __('main.Total count') }}: {{ $categories->total() }}</div>
    </div>
    <div class="col-sm-12 col-md-7">
        {{ $categories->links() }}

    </div>
</div>
</div>
    </div>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
