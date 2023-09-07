@extends('layout')

@section('content')
@if(session('notification'))
    <div class="alert alert-success">{{ session('notification') }}</div>
@endif
<div id="cart" class="results container">
    <h2>В КОЛИЧКАТА</h2>
    <ul id="cart-items" class="list-group">
        @foreach ($products as $product)
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ $product->imageUrl }}" class="img-fluid" alt="{{ $product->imageUrl }}" />
                </div>
                <div class="col-md-9 product-info">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="description">{{ $product->description }}</p>
                    <p class="price">Цена: <strong>{{ $product->price }} лв.</strong></p>
                    <a href="/details/{{$product->id}}" class="cta btn btn-secondary rounded-5 mb-2">Преглед</a>
                    <form method="post" action="/remove-from-cart">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="cta btn btn-danger rounded-5">Премахни</button>
                    </form>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    <p class="total-price">Общо: <strong>{{
        array_reduce($products, function ($carry, $item) {
            return $carry + $item->price;
        }, 0)
    }} лв.</strong></p>

    <button class="cta btn agreeBtn rounded-5">Продължи</button>
</div>
    
@endsection