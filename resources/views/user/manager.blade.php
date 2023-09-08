@extends('layout')

@section('content')
@if(session('notification'))
    <div class="alert alert-success">{{ session('notification') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<div id="results" class="results container">
    <a href="/private/manager/create" id="addProduct" class="btn btn-primary">+ Добави продукт</a>
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
                    <a href="/private/manager/edit/{{$product->id}}" class="btn btn-warning rounded-5">Промени</a>
                    <a href="/private/manager/delete/{{$product->id}}" class="btn btn-danger rounded-5">Изтрий</a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection