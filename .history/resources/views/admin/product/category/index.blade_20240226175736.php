@extends('adminlte::page')

@section('title', 'Dashboard')

{{-- @section('content_header')
    <h1>Dashboard</h1>
@stop --}}

@section('content')
<br>
<div class="card">
    <div class="card-header">
    <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
    </div>

    <div class="card-body">
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
    <thead>
    <tr>
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID">ID</th>
        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Name</th>
        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending">Description</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr class="odd">
            <td class="dtr-control sorting_1" tabindex="0">{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
        </tr>
        @endforeach

    </tbody>

    </table>
</div>
</div>
<div class="row">

    {{-- <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            <ul class="pagination">
                <li class="paginate_button page-item previous disabled" id="example2_previous">
                    <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                </li>
                <li class="paginate_button page-item active">
                    <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                </li>
                <li class="paginate_button page-item ">
                    <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                </li><li class="paginate_button page-item ">
                    <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                </li>
                <li class="paginate_button page-item ">
                    <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                </li>
                <li class="paginate_button page-item ">
                    <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                </li>
                <li class="paginate_button page-item ">
                    <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                </li>
                <li class="paginate_button page-item next" id="example2_next">
                    <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                </li>
            </ul>
        </div>
    </div> --}}
</div>
</div>
    </div>

    </div>
    {{ $categories->links() }}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
