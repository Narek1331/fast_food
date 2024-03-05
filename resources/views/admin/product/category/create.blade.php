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
            {{ __('main.Create new category') }}
        </h3>
    </div>
    <form action="{{ route('admin.product.category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group text-center">
                <img src="" class="img-fluid" style="width: 150px; height: 150px; object-fit: cover;" id="previewImg">
            </div>
            <div class="form-group">

                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="image">
                    <label  class="custom-file-label" for="customFile">{{__('main.Choose image')}}</label>
                    @error('image')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @foreach ($languages as $lang)

            <div class="form-group">
                <label for="Input{{ $lang->name }}">{{ $lang->name }} {{ __('main.Variant') }}</label>
                <input type="text" class="form-control" id="Input{{ $lang->name }}" placeholder="Enter {{ $lang->name }}" name="{{ $lang->name }}">
                @error($lang->name)
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            @endforeach
            <div class="text-center">
                <button class="btn btn-primary">
                    {{ __('main.Save') }}
                </button>
            </div>

        </div>
    </form>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        document.getElementById('customFile').addEventListener('change', function(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function() {
            var dataURL = reader.result;
            var previewImage = document.getElementById('previewImg');
            previewImage.src = dataURL;
        };

        reader.readAsDataURL(input.files[0]);
    });
    </script>
@stop
