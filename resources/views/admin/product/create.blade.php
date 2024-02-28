@extends('adminlte::page')

@section('title', __('main.Product create'))

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            {{ __('main.Create new product') }}
        </h3>
    </div>
    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="InputCategory">{{ __('main.Select the category')}}</label>
                <select class="custom-select form-control-border" id="InputCategory" name="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @foreach ($languages as $lang)

            <div class="form-group">
                    <label for="Input{{ $lang->name }}"> {{ __('main.Enter the name') . ' '. __('main.'.$lang->name) }}</label>
                    <input type="text" class="form-control" id="Input{{ $lang->name }}" placeholder="{{ __('main.Enter the name') . ' '. __('main.'.$lang->name) }}" name="{{ $lang->name }}[name]">
                @error($lang->name .'.name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="Input{{ $lang->name }}" placeholder="{{ __('main.Enter the description') . ' '. __('main.'.$lang->name) }}" name="{{ $lang->name }}[description]">
            @error($lang->name .'.description')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
            @endforeach
            
            <div class="form-group">
                <label for="InputPrice"> {{ __('main.Enter the price') }} ֏</label>
                <input type="number" class="form-control" id="InputPrice" placeholder="{{ __('main.Enter the price') }}" name="price">
                @error('price')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
            <div class="form-group">
                <label for="selectSizes">
                    {{__('main.Add Sizes and price')}}
                </label>

                @foreach($sizes as $size)
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="size_{{ $size->id }}" data-target="input_{{ $size->id }}">
                                <label class="form-check-label" for="size_{{ $size->id }}">
                                    {{$size->name}}
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="number" class="form-control" id="input_{{ $size->id }}" placeholder="{{ __('main.Enter the price') . ' '. $size->name}}" name="sizes[{{ $size->name }}]" disabled> 
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>

                <div class="form-group">
                    <label>
                        {{__('main.Select ingredients')}}
                    </label>
                    <select multiple="" class="form-control" name="ingredients[]" >
                        @foreach ($ingredients as $ingredient )
                            <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                        @endforeach
                    </select>
                </div>
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
    document.addEventListener("DOMContentLoaded", function() {
        const checkboxes = document.querySelectorAll('.form-check-input');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const inputId = this.dataset.target;
                const input = document.getElementById(inputId);
                const mainPriceInput = document.getElementById('InputPrice');
                mainPriceInput.value = 0
                input.disabled = !this.checked;
            });
        });
    });
</script>
@stop
