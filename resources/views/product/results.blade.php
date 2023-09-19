@extends('layout')

@section('content')
    <x-search-bar />
    @if (session('notification'))
        <div class="alert alert-success">{{ session('notification') }}</div>
    @endif
    <div id="results" class="results container">
        <h2>РЕЗУЛТАТИ</h2>
        <ul class="list-group">
            {{-- CLIENT-SIDE RENDER --}}
            {{-- @foreach ($products as $product)
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{$product->imageUrl}}" class="img-fluid" alt="{{ $product->imageUrl }}">
                </div>
                <div class="col-md-9 product-info">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="description">{{$product->description}}</p>
                    <p class="price">Цена: <strong>{{$product->price}} лв.</strong></p>
                    <form method="post" action="/add-to-cart">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="cta btn agreeBtn rounded-5 mb-2">Добави количката</button>
                    </form>
                    <a href="/details/{{$product->id}}" class="cta btn btn-secondary rounded-5">Преглед</a>
                    
                </div>
            </div>
        </li>
        @endforeach
        {{$products->links()}}
        @if (count($products) === 0)
            <p>Няма намерени резултати</p>
        @endif --}}

        </ul>
        <div id="load-more-container" class="text-center mt-4">
            <button id="load-more-btn" class="btn btn-primary btn-lg rounded-5">Покажи още</button>
        </div>
    </div>

    <script>
        let page = 1;

        function loadProducts() {
            $.ajax({
                url: '/getProducts',
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    page: page
                },
                success: function(response) {
                    // Handle the response data
                    if (response.products.data.length > 0) {
                        const productsList = $(
                            '.list-group'); 

                        $.each(response.products.data, function(index, product) {
                            // Create HTML elements for each product and append them to the product list container
                            const productItem = $('<li class="list-group-item"></li>');
                            productItem.html(`<div class="row">
                <div class="col-md-3">
                    <img src="${ product.imageUrl }" class="img-fluid" alt="${ product.imageUrl}">
                </div>
                <div class="col-md-9 product-info">
                    <h5 class="card-title">${ product.name}</h5>
                    <p class="description">${ product.description}</p>
                    <p class="price">Цена: <strong>${ product.price} лв.</strong></p>
                    <form method="post" action="/add-to-cart">
                        @csrf
                        <input type="hidden" name="product_id" value="${ product.id}">
                        <button type="submit" class="cta btn agreeBtn rounded-5 mb-2">Добави количката</button>
                    </form>
                    <a href="/details/${ product.id}" class="cta btn btn-secondary rounded-5">Преглед</a>
                </div>
            </div>`);

                            productsList.append(productItem);
                        });

                        page++;

                        // Check if there are more pages to load
                        if (response.products.next_page_url) {
                            $('#load-more-container').show();
                        } else {
                            $('#load-more-container').hide();
                        }
                    } else {
                        $('.list-group').html('<p>Няма намерени резултати</p>');
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }

        // initial load
        loadProducts();

        $('#load-more-btn').click(function() {
            loadProducts();
        });
    </script>
@endsection
