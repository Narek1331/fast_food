@extends('main.layout')

 @section('title', __('main.To Order'))


 @section('content')

  <!-- Single Page Header start -->
  <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">{{__('main.To Order')}}</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home',['locale'=>app()->getLocale()]) }}">{{__('main.Home')}}</a></li>
                <li class="breadcrumb-item active text-white">{{__('main.To Order')}}</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Checkout Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">{{__('main.Billing details')}}</h1>
                <form action="{{route('order.store',['locale'=>app()->getLocale()])}}" method="POST">
                    @csrf
                    <div class="row g-5">
                        <div class="col-md-12 col-lg-6 col-xl-7">
                            <div class="form-item">
                                <label class="form-label my-3">{{ __('main.Name') }}<sup>*</sup></label>
                                <input type="text" class="form-control" id="name" name="name" required placeholder="{{ __('main.Enter the name') }}" value="{{auth()->user()->name}}">
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-item">
                                <label class="form-label my-3">{{ __('main.email') }}<sup>*</sup></label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="{{ __('main.Enter the email') }}" value="{{auth()->user()->email}}">
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-item">
                                <label class="form-label my-3">{{ __('main.Phone Number') }}<sup>*</sup></label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" required placeholder="{{ __('main.Enter the phone number') }}" value="{{auth()->user()->phone_number}}">
                                @error('phone_number')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-item">
                                <label for="states" class="form-label my-3">{{ __('main.Select a state') }}<sup>*</sup></label>
                                <select id="states" name="state" class="form-select" required>
                                    @foreach ($states as $state)
                                        <option value="{{ $state['id'] }}">{{ $state['name'] }}</option>
                                    @endforeach
                                </select>

                                <label for="settlements" class="form-label my-3">{{ __('main.Select a settlement') }}<sup>*</sup></label>
                                <select id="settlements" name="settlement" class="form-select" required>
                                </select>
                            </div>


                            <div class="form-item">
                                <label class="form-label my-3">{{__('main.Enter address')}}<sup>*</sup></label>
                                <input type="text" class="form-control" name="address" required>
                            </div>


                            <div class="form-item my-3">
                                <textarea name="notes" class="form-control" spellcheck="false" cols="30" rows="11" placeholder="{{__('main.Order Notes')}}"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6 col-xl-5">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($baskets as $basket)

                                            <tr>
                                                <th scope="row">
                                                    <div class="d-flex align-items-center mt-2">
                                                        <img src="{{$basket->product_img_path}}" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                                    </div>
                                                </th>
                                                <td class="py-5">{{$basket->product_name}}</td>
                                                <td class="py-5">{{ $basket->product_price ? $basket->product_price : $basket->product_size_price }} ֏</td>
                                                <td class="py-5">{{ $basket->basket_size_name ?? '-' }}</td>
                                                <td class="py-5">{{ $basket->basket_count }}</td>
                                                <td class="py-5">
                                                    {{ $basket->ingredient_names ?? '-' }}
                                                </td>
                                                <td class="py-5">{{$basket->total_price}} ֏</td>
                                            </tr>
                                        @endforeach


                                        <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark py-4">{{ __('main.Payment method') }}</p>
                                            </td>
                                            <td colspan="3" class="py-5">
                                                @foreach ($payment_methods as $pay)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault1" value="{{$pay->id}}" checked>
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            {{ $pay->translate->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark text-uppercase py-3">{{{__('main.Total cost with delivery')}}}</p>
                                            </td>
                                            <td class="py-5"></td>
                                            <td class="py-5"></td>
                                            <td class="py-5">
                                                <div class="py-3 border-bottom border-top">
                                                    <p class="mb-0 text-dark">{{formatPrice(config('delivery.price') + $baskets->sum('total_price'))}} ֏</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">{{__('main.Place Order')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Checkout Page End -->
@endsection

@section('js')
<script>
    const statesData = <?php echo json_encode($states); ?>;
    const stateSelect = document.getElementById('states');
    const settlementSelect = document.getElementById('settlements');

    function populateSettlements() {
        const selectedState = stateSelect.value;
        // const stateData = statesData.find(state => state.name === selectedState);
        const stateData = statesData.find(state => state.id == selectedState);

        settlementSelect.innerHTML = ''; // Clear previous options
        stateData.settlements.forEach(settlement => {
            const option = document.createElement('option');
            option.value = settlement.id;
            option.textContent = settlement.name;
            settlementSelect.appendChild(option);
        });
    }

    stateSelect.addEventListener('change', populateSettlements);
    populateSettlements(); // Initial population
</script>
@endsection
