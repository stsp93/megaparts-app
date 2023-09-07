@extends('layout')

@section('content')
    <div class="details container">
        <div class="row">
            <img src="{{$product->imageUrl}}" class="details-img img-fluid col-md" alt="{{$product->imageUrl}}" />
            <div class="details-body col-md">
                <h3 class="details-title" id="product-title">{{$product->name}}</h3>
                <p class="additional-info">{{$product->description}}</p>
                <div>
                    <p class="number" id="product-number">Кат. &#8470;: s_167232784</p>
                    <p class="price" id="product-price">{{$product->price}} лв.</p>
                </div>
                <form method="post" action="/add-to-cart">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="cta btn agreeBtn rounded-5 mb-2">Добави количката</button>
                </form>
                <a href="{{url()->previous()}}" class="cta btn rounded-5 backBtn">Назад</a>
            </div>
        </div>
    </div>
@endsection
