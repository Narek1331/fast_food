@extends('main.layout')

@section('title', __('main.Home'))


@section('content')
    <!-- Header section Start -->
    <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-7">
                        <h1 class="mb-5 display-3 text-primary">
                            {{ __('main.Quality service') }}
                        </h1>
                        <div class="position-relative mx-auto">
                            <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number" placeholder="{{ __('main.Search') }}">
                            <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">
                                {{ __('main.Find') }}
                            </button>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
        <!-- Header section End -->


        <!-- Categories Section Start -->
        <div class="container-fluid featurs py-5">
            <div class="container py-5">
                <div class="row g-4">
                    @foreach ($categories as $category)
                    <div class="col-md-4 col-sm-6 mb-grid-gutter">
                        <a class="card border-0 shadow" href="food-delivery-category.html">
                            <img class="card-img-top" src="{{ $category->img_path }}" alt="Noodles">
                            <div class="card-body py-4 text-center">
                            <h3 class="h5 mt-1">{{ $category->translate->name }}</h3>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Categories Section End -->


        <!-- Info Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="bg-light p-5 rounded">
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>{{__('main.Satisfied customers')}}</h4>
                                <h1>1000+</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>{{__('main.Quality of service')}}</h4>
                                <h1>99%</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>{{__('main.Workers')}}</h4>
                                <h1>10+</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>{{__('main.Available Foods')}}</h4>
                                <h1>100+</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Info End -->


@endsection
