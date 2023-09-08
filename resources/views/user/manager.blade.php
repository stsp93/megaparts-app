@extends('layout')

@section('content')
<div id="results" class="results container">
    <button id="addProduct" class="btn btn-primary">+ Добави продукт</button>
    <h2>Продукти</h2>
    <ul class="list-group">
        @foreach ($products as $product)
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{$product->imageUrl}}" class="img-thumbnail" alt="{{$product->imageUrl}}">
                </div>
                <div class="col-md-9 product-info">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="description">{{$product->description}}</p>
                    <p class="price">Цена: <strong>{{$product->price}} лв.</strong></p>
                    <button class="btn btn-warning rounded-5">Промени</button>
                    <a href="/private/manager/delete/{{$product->id}}" class="btn btn-danger rounded-5">Изтрий</a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection