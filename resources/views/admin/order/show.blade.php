@extends('adminlte::page')

@section('title', __('main.Show Order'))

{{-- @section('content_header')
    <h1>Dashboard</h1>
@stop --}}

@section('content')
<section class="h-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-10 col-xl-8">
          <div class="card" style="border-radius: 10px;">
            <div class="card-header px-4 py-5 text-center">
              <h5 class="text-muted mb-0">{{__('main.Order Number')}} {{$order['order']['order_number']}}</h5>
            </div>
            <div class="card-header px-4 py-5 text-center">
                @if ($order['order']['ended'] != 1)
                <form id="statusForm" action="{{ route('admin.order.update_status', ['id' => $order['order']['id']]) }}" method="post"> 
                    @csrf 
                    @method('PATCH')
                    <div class="form-group">
                        <label>{{ __('main.Change Status') }}</label>
                        <select class="form-control" id="statusSelect" name="status">
                            @foreach($order_statuses as $order_status)
                            <option value="{{ $order_status['id'] }}" @if($order['order']['status'] == $order_status['id']) selected @endif>
                                {{ __('main.' . $order_status['name']) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </form>
                @else
                <div class="alert alert-info">
                    {{ __('main.Order has ended, status cannot be changed') }}
                </div>
                @endif
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
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/order_detail.css">
@stop

@section('js')
<script>
    document.getElementById('statusSelect').addEventListener('change', function() {
        document.getElementById('statusForm').submit();
    });
</script>

@stop
