@extends('layout')

@section('content')

<div id="results" class="results container">
    <h2>РЕЗУЛТАТИ</h2>
    <ul class="list-group">
        @foreach ($products as $product)
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-3">
                    <img src="./assets/img/products/product1.png" class="img-fluid" alt="Product 1">
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
        
    </ul>

    <a href="{{url()->previous()}}" class="cta btn backBtn rounded-5">Назад</a>
</div>
    
@endsection