@extends('adminlte::page')

@section('title', 'Dashboard')

{{-- @section('content_header')
    <h1>Dashboard</h1>
@stop --}}

@section('content')
<br>
<div class="card">
    <div class="card-header">
    <h3 class="card-title">
        {{ __('List categories') }}
    </h3>
    </div>

    <div class="card-body">
    <div class="text-center">
        <a class="btn" href="{{ route('admin.product.create') }}">
            {{ __('Create new category') }}
        </a>
    </div>
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
    <thead>
    <tr>
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID">ID</th>
        @foreach ($languages as $num => $lang)
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="{{$lang->name}} Name: activate to sort column ascending">{{$lang->name}} name</th>
        @endforeach
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID">
            {{ __('Action') }}
        </th>

    </tr>
    </thead>
    <tbody>

        @foreach ($categories as $num => $category)
        <tr class="odd">

            <td class="dtr-control sorting_1" tabindex="{{ $num }}">{{ $category->id }}</td>
            @foreach($category->languages as $lang)
                <td>{{ $lang->name }}</td>

            @endforeach
            <td>
                <div>
                    <form action="">
                        <button class="btn btn-danger">Delete</button>
                    </form>
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
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"> Total count: {{ $categories->total() }}</div>
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
    <script> console.log('Hi!'); </script>
@stop
