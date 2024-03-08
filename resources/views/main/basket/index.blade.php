@extends('main.layout')

@section('title', __('main.Basket'))

@section('content')
     <!-- Single Page Header start -->
     <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">{{ __('main.Basket') }}</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home',['locale'=>app()->getLocale()]) }}">{{ __('main.Home') }}</a></li>
                <li class="breadcrumb-item active text-white">{{ __('main.Basket') }}</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                @if(count($baskets))
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">{{ __('main.Product') }}</th>
                            <th scope="col">{{ __('main.Name') }}</th>
                            <th scope="col">{{ __('main.Price') }}</th>
                            <th scope="col">{{ __('main.Size') }}</th>
                            <th scope="col">{{ __('main.Quantity') }}</th>
                            <th scope="col">{{ __('main.Ingredients') }}</th>
                            <th scope="col">{{ __('main.Total') }}</th>
                            <th scope="col">{{ __('main.Action') }}</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($baskets as $basket)
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $basket->product_img_path }}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                        </div>
                                    </th>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $basket->product_name }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $basket->product_price ? $basket->product_price : $basket->product_size_price }} ֏ </p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $basket->basket_size_name ?? '-' }} </p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $basket->basket_count }}</p>

                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $basket->ingredient_names ?? '-' }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $basket->total_price }} ֏</p>
                                    </td>
                                    <td>
                                        <form action="{{route('basket.destroy',['locale'=>app()->getLocale(),'id' => $basket->basket_id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-md rounded-circle bg-light border mt-4" type="submit">
                                                <i class="fa fa-times text-danger"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                {{-- <div class="mt-5">
                    <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
                </div> --}}
                <br>
                <div class="">
                    <div class=""></div>
                    <div class="">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                @if(count($baskets))

                                <h1 class="display-6 mb-4">{{__('main.Total cart count')}}</h1>
                                {{-- <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">{{__('main.Subtotal')}}</h5>
                                    <p class="mb-0">{{$baskets->sum('total_price')}} ֏</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">{{__('main.Shipping')}}</h5>
                                    <div class="">
                                        <p class="mb-0">Flat rate: $3.00</p>
                                    </div>
                                </div>
                                <p class="mb-0 text-end">Shipping to Ukraine.</p>
                            </div> --}}
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">{{__('main.Total')}}</h5>
                                <p class="mb-0 pe-4">{{formatPrice($baskets->sum('total_price'))}} ֏</p>
                            </div>
                            <a href="{{route('order.index',['locale'=>app()->getLocale()])}}" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">{{__('main.Proceed Checkout')}}</a>
                            @else
                            <div class="text-center">
                                <a href="{{route('food.index',['locale'=>app()->getLocale()])}}" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">{{__('main.The basket is empty. return to Food page')}}</a>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->
@endsection
