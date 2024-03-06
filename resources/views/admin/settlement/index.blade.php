@extends('adminlte::page')

@section('title', __('main.Settlements'))

@section('content')
<br>
<div class="card">
    <div class="card-header">
    <h3 class="card-title">
        {{ __('main.Settlements') }}
    </h3>
    </div>

    <div class="card-body">
    <div class="text-center">
        <a class="btn" href="{{ route('admin.settlement.create') }}">
            {{ __('main.Create new') }}
        </a>
    </div>
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
    <thead>
    <tr>
        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID">ID</th>
        <th>{{ __('main.Name') }}</th>
        <th>{{ __('main.State') }}</th>
        <th>{{ __('main.Action') }}</th>

    </tr>
    </thead>
    <tbody>

        @foreach ($settlements as $settlement)
        <tr class="odd">

            <td class="dtr-control sorting_1" tabindex="{{ $settlement->id }}">{{ $settlement->id }}</td>
            <td>{{ $settlement->name }}</td>
            <td>{{ $settlement->state->name }}</td>
            <td>
                <div class="d-flex justify-content-between">
                    <form method="POST" action="{{ route('admin.settlement.destroy',['id'=>$settlement->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            {{ __('main.Delete') }}
                        </button>
                    </form>
                    <a class="btn btn-primary"  href="{{ route('admin.settlement.edit', ['id' => $settlement->id]) }}">
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
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"> {{ __('main.Total count') }}: {{ $settlements->total() }}</div>
    </div>
    <div class="col-sm-12 col-md-7">
        {{ $settlements->links() }}

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
