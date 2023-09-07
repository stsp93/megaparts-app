@extends('layout')

@section('content')
<x-search-bar />

<div id="results" class="results container">
    <h2>РЕЗУЛТАТИ</h2>
    <ul class="list-group">
        @foreach ($products as $product)
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{$product->imageUrl}}" class="img-fluid" alt="Product 1">
                </div>
                <div class="col-md-9 product-info">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="description">{{$product->description}}</p>
                    <p class="price">Цена: <strong>{{$product->price}} лв.</strong></p>
                    <button class="cta btn agreeBtn rounded-5">Купи</button>
                </div>
            </div>
        </li>
        @endforeach
        {{$products->links()}}
        @if (count($products) === 0)
            <p>Няма намерени резултати</p>
        @endif
        
    </ul>
</div>
    
@endsection