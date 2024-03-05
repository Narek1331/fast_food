@extends('main.layout')

@section('title', 'Page Title')

@section('content')
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">{{ __('main.Food') }}</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="/">{{ __('main.Home') }}</a></li>
                <li class="breadcrumb-item active text-white">{{ __('main.Food') }}</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                {{-- <h1 class="mb-4">
                    {{ __('main.Fresh foods') }}
                </h1> --}}
                <div class="row g-4">
                    <div class="col-lg-12">

                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>
                                                {{ __('main.Categories') }}
                                            </h4>
                                            <ul class="list-unstyled fruite-categorie">
                                                @foreach ($categories as $category)

                                                    <li>
                                                        <div class="d-flex justify-content-between fruite-name">
                                                            <a href=""><i class="fas fa-hamburger me-2"></i>{{ $category->name }}</a>
                                                        </div>
                                                    </li>
                                                @endforeach


                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">
                                    @foreach ($products as $productNum =>  $product)
                                    <form method="POST" action="{{route('basket.store',['locale'=>app()->getLocale()])}}" class="col-md-6 col-lg-6 col-xl-4">
                                    @csrf
                                    <input hidden name="product_id" value="{{$product->id}}">
                                    <input hidden name="size_id" value="{{count($product->sizes) ? $product->sizes[0]->size_id : 0 }}" id="product_size_{{$productNum}}">
                                        {{-- <div class="col-md-6 col-lg-6 col-xl-4"> --}}
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{ $product->img_path }}" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                {{-- <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div> --}}
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4 class="text-center" style="height:50px!important;">{{ $product->name }}</h4>
                                                    <div class="justify-content-center d-flex" >
                                                        <h3 id="product_price_{{$productNum}}">{{$product->price ? $product->price : $product->sizes[0]['price']}}</h3>
                                                        <h3>֏</h3>
                                                    </div>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">

                                                        <p id="product_all_sizes_{{$productNum}}" style="height:50px!important;width:100%!important" class="text-center">
                                                            @foreach ($product->sizes as $key => $size)
                                                                <a class="@if($key == 0) size_active @endif btn border border-secondary rounded-pill px-3 text-primary" onclick="selectProductSize(this,{{ $size->price }},{{$productNum}},{{$size->size_id}})">
                                                                    {{ $size->name }}
                                                                </a>
                                                            @endforeach
                                                        </p>
                                                        <div>


                                                        </div>

                                                    </div>

                                                    <div class="text-center" style="height:10px!important">
                                                        @if(count($product->ingredients))

                                                        <ul class="list-group list_z_index d-none" id="toggleContent_{{$productNum}}">
                                                            <li class="list-group-item list_z_index text-center">
                                                                <button class="btn text-secondary" onclick="toggleContent({{$productNum}})" type="button">
                                                                    {{__('main.Close the window')}}
                                                                </button>
                                                            </li>
                                                            @foreach ($product->ingredients as $key => $ingredient)

                                                            <li class="list-group-item list_z_index">
                                                            <input class="form-check-input me-1 text-secondary" type="checkbox" value="{{$ingredient->translate->languageable_id}}" name="ingredients[]" checked>
                                                                {{$ingredient->translate->name}}
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        <button type="button" class="btn text-secondary" onclick="toggleContent({{$productNum}})" id="toggleContentBtn_{{$productNum}}">
                                                            {{__('main.Select ingredient')}}
                                                        </button>
                                                        @endif
                                                    </div>
                                                    <br>
                                                    <div class="text-center">
                                                        <div class="input-group">
                                                            <button class="btn btn-outline-secondary" type="button" id="decrementButtonss" onclick="decrementButton({{$productNum}})">-</button>
                                                            <input readonly type="text" class="form-control text-center" value="1" id="quantityInput_{{$productNum}}" name="count">
                                                            <button class="btn btn-outline-secondary" type="button" id="incrementButtonss" onclick="incrementButton({{$productNum}})">+</button>
                                                          </div>
                                                    </div>
                                                    <br>
                                                    <div style="width:100%!important">
                                                        <button style="width:100%!important" class="btn btn-secondary btn-outline-secondary text-dark" type="submit" >
                                                            <i class="fa fa-shopping-bag me-2 text-primary"></i>
                                                            {{__('main.Add to basket')}}

                                                        </button>

                                                    </div>
                                                </div>

                                            </div>
                                        {{-- </div> --}}
                                        </form>
                                    @endforeach

                                    <div class="col-12">
                                        <div class="pagination d-flex justify-content-center mt-5">
                                            <a href="#" class="rounded">&laquo;</a>
                                            <a href="#" class="active rounded">1</a>
                                            <a href="#" class="rounded">2</a>
                                            <a href="#" class="rounded">3</a>
                                            <a href="#" class="rounded">4</a>
                                            <a href="#" class="rounded">5</a>
                                            <a href="#" class="rounded">6</a>
                                            <a href="#" class="rounded">&raquo;</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->
        @endsection

        @section('js')
            <script>

                function decrementButton(num) {
                    let quantityInput = document.getElementById('quantityInput_' + num);
                    let product_price_n = document.getElementById('product_price_' + num);

                    let currentValue = parseInt(quantityInput.value);
                    let priceValue = parseInt(product_price_n.innerHTML);
                    let newPrice = +priceValue - (+priceValue / +currentValue);

                    if (currentValue > 1) {
                        quantityInput.value = currentValue - 1;
                        product_price_n.innerHTML = newPrice;
                    }
                }

                function incrementButton(num) {
                    let quantityInput = document.getElementById('quantityInput_' + num);
                    let product_price_n = document.getElementById('product_price_' + num);

                    let currentValue = parseInt(quantityInput.value);
                    let priceValue = parseInt(product_price_n.innerHTML);
                    let newPrice = (+priceValue / +currentValue) + +priceValue;

                    quantityInput.value = currentValue + 1;
                    product_price_n.innerHTML = newPrice;
                }

                function selectProductSize(element,price,num,id){
                    let product_size = document.getElementById('product_size_' + num);
                    product_size.value = id;
                    let quantityInput = document.getElementById('quantityInput_' + num);

                    quantityInput.value = 1;
                    const sizes = document.getElementById('product_all_sizes_'+num);
                    const product_price_n = document.getElementById('product_price_'+num);

                    if (sizes) {
                        const links = sizes.querySelectorAll('a');
                        links.forEach(link => {
                            link.classList.remove('size_active');
                        });
                    }

                    if (!element.classList.contains('size_active')) {
                        element.classList.add('size_active');
                    }
                    product_price_n.innerHTML = price;
                }

                function toggleContent(num) {
                    let content = document.getElementById("toggleContent_"+num);
                    let contentBtn = document.getElementById("toggleContentBtn_"+num);
                    console.log(contentBtn)
                    if (content.classList.contains("d-none")) {
                    content.classList.remove("d-none");
                    content.classList.add("d-block");

                    contentBtn.classList.add("d-none");


                    } else {
                    content.classList.remove("d-block");
                    content.classList.add("d-none");

                    contentBtn.classList.remove("d-none");
                    }
                }
            </script>
        @endsection
