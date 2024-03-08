@extends('main.layout')

@section('title', __('main.My Orders'))


@section('content')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">{{__('main.My Orders')}}</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('home',['locale'=>app()->getLocale()]) }}">{{__('main.Home')}}</a></li>
        <li class="breadcrumb-item active text-white">{{__('main.My Orders')}}</li>
    </ol>
</div>
<!-- Single Page Header End -->

<br>
<!-- Buttons to select orders and archived orders -->
<div class="container">
  <div class="d-flex justify-content-center">
    @if(request()->has('archived') && request()->archived == 1)
      <a href="{{ route('order.my', ['locale' => app()->getLocale()]) }}" type="button" class="btn btn-primary">
        {{ __('main.View active orders') }}
      </a>
    @elseif(request()->has('archived') && request()->archived == 0)
      <a href="{{ route('order.my', ['locale' => app()->getLocale(), 'archived' => 1]) }}" type="button" class="btn btn-primary">
        {{ __('main.View archived orders') }}
      </a>
    @else
      <a href="{{ route('order.my', ['locale' => app()->getLocale(), 'archived' => 1]) }}" type="button" class="btn btn-primary">
        {{ __('main.View archived orders') }}
      </a>
    @endif
  </div>
</div>
<!-- Buttons to select orders and archived orders -->

<!-- Orders start -->
@if(count($orders))
@foreach($orders as $num => $order)
<section class="h-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-10 col-xl-8">
          <div class="card" style="border-radius: 10px;">
            <div class="card-header px-4 py-5 text-center">
              <h5 class="text-muted mb-0">{{__('main.Order Number')}} {{$order['order']['order_number']}}</h5>
            </div>
            <div class="card-body p-4">
                @foreach($order['order_products'] as $order_product)
                    <div class="card shadow-0 border mb-4">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                            <img src="{{$order_product['product_img_path']}}"
                                class="img-fluid" alt="{{$order_product['product_name']}}">
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                            <p class="text-muted mb-0">{{$order_product['product_name']}}</p>
                            </div>
                            {{-- <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                            <p class="text-muted mb-0 small">{{__('main.Price')}}:{{$order_product['product_size_price'] ? $order_product['product_size_price'] : $order_product['product_price']}}֏</p>
                            </div> --}}
                            @if($order_product['order_product_size_name'])
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                            <p class="text-muted mb-0 small">{{__('main.Size')}}: {{$order_product['order_product_size_name'] ?? '-'}}</p>
                            </div>
                            @endif
                            @if($order_product['ingredient_names'])
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                            <p class="text-muted mb-0 small">
                              {{__('main.Ingredients')}}:
                              {{$order_product['ingredient_names'] ?? '-'}}
                            </p>
                            </div>
                            @endif
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                              <p class="text-muted mb-0 small">{{__('main.Quantity')}}: {{$order_product['order_product_count']}}</p>
                              </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                            <p class="text-muted mb-0 small">{{__('main.Total')}}: {{$order_product['total_price']}}</p>
                            </div>

                        </div>

                        </div>
                    </div>
                @endforeach


              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">{{__('main.Order Number')}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4"></span>{{$order['order']['order_number']}}</p>
              </div>

              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">{{__('main.Name')}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4"></span>{{$order['order']['name']}}</p>
              </div>

              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">{{__('main.email')}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4"></span>{{$order['order']['email']}}</p>
              </div>

              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">{{__('main.Phone Number')}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4"></span>{{$order['order']['phone_number']}}</p>
              </div>

              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">{{__('main.State')}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4"></span>{{$order['order']['state'] ?? null}}</p>
              </div>

              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">{{__('main.Settlement')}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4"></span>{{$order['order']['settlement'] ?? null}}</p>
              </div>

              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">{{__('main.Address')}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4"></span>{{$order['order']['address']}}</p>
              </div>

              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">{{__('main.Payment method')}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4"></span>{{$order['order']['payment_method_name']}}</p>
              </div>

              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">{{__('main.Delivery price')}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4"></span>{{config('delivery.price')}}֏</p>
              </div>

              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">{{__('main.Date')}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4"></span>{{$order['order']['date']}}</p>
              </div>


              <br>
              <div class="" style="width:100%!important">
                <div class="mb-3">
                  {{-- <label for="exampleFormControlTextarea1" class="fw-bold form-label">{{__('main.Order Notes')}}</label> --}}
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>
                    {{$order['order']['notes']}}
                  </textarea>
                </div>
              </div>



              <div class="container py-5">
                <div class="row">

                  <div class="col-md-12 col-lg-12">
                    <div id="tracking-pre"></div>
                    <div id="tracking">
                      <div class="tracking-list">
                        @foreach($order_statuses as $num => $order_status)

                        <div class="tracking-item{{ ($order_status->sequence > $order['order']['status']) ? '-pending' : '' }}">
                          <div class="tracking-icon status-intransit">
                            <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                            </svg>
                          </div>

                          <div class="tracking-content">
                            {{__('main.' . $order_status->name)}}
                            <span></span>
                          </div>
                        </div>
                        @endforeach
                        {{-- <div class="tracking-item">
                          <div class="tracking-icon status-intransit">
                            <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                            </svg>
                          </div>
                          <div class="tracking-date"><img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" /></div>
                          <div class="tracking-content">Order Confirmed<span>09 Aug 2025, 10:30am</span></div>
                        </div>
                        <div class="tracking-item">
                          <div class="tracking-icon status-intransit">
                            <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                            </svg>
                          </div>
                          <div class="tracking-date"><img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" /></div>
                          <div class="tracking-content">Packed the product<span>09 Aug 2025, 12:00pm</span></div>
                        </div>
                        <div class="tracking-item">
                          <div class="tracking-icon status-intransit">
                            <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                            </svg>
                          </div>
                          <div class="tracking-date"><img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" /></div>
                          <div class="tracking-content">Arrived in the warehouse<span>10 Aug 2025, 02:00pm</span></div>
                        </div>
                        <div class="tracking-item">
                          <div class="tracking-icon status-current blinker">
                            <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                            </svg>
                          </div>
                          <div class="tracking-date"><img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" /></div>
                          <div class="tracking-content">Near by Courier facility<span>10 Aug 2025, 03:00pm</span></div>
                        </div>

                        <div class="tracking-item-pending">
                          <div class="tracking-icon status-intransit">
                            <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                            </svg>
                          </div>
                          <div class="tracking-date"><img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" /></div>
                          <div class="tracking-content">Out for Delivery<span>12 Aug 2025, 05:00pm</span></div>
                        </div>
                        <div class="tracking-item-pending">
                          <div class="tracking-icon status-intransit">
                            <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                              <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                            </svg>
                          </div>
                          <div class="tracking-date"><img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" /></div>
                          <div class="tracking-content">Delivered<span>12 Aug 2025, 09:00pm</span></div>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              </div>


            </div>

            <div class="card-footer border-0 px-4 py-5 bg-secondary"
              style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">

              <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">
                {{__('main.Total cost with delivery')}}:
                <span class="h2 mb-0 ms-2">
                  {{formatPrice(config('delivery.price') + $order['order']['total_order_products_price'])}} ֏
                </span>
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endforeach
@else
<br>
<div class="container">
  <div class="d-flex justify-content-center">
    <h5>{{__('main.The orders is empty')}}</h5>
  </div>
</div>
@endif
<!-- Orders end -->

@endsection
