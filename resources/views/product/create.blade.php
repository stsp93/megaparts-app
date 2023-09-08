@extends('layout')

@section('content')
    <div class="form container">
        <h2>Добави Продукт</h2>
        <form method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Име</label>
                <input type="text" class="form-control rounded-5" name="name" placeholder="Въведете име">
                @error('name')
                    <p class="text-danger">Името трябва да е поне 3 символа</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <input type="text" class="form-control rounded-5" name="description" placeholder="Въведете описание">
                @error('description')
                    <p class="text-danger">Описанието трябва да е поне 10 символа</p>
                @enderror
            </div><div class="mb-3">
                <label for="price" class="form-label">Описание</label>
                <input type="text" class="form-control rounded-5" name="price" placeholder="Въведете описание">
                @error('price')
                    <p class="text-danger">Невалиден формат за цена</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="imageUrl" class="form-label">Линк към снимка</label>
                <input type="text" class="form-control rounded-5" name="imageUrl" placeholder="Въведете линка">
                @error('imageUrl')
                    <p class="text-danger">Линка тряба да е валиден url</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-success rounded-5">+Добави продукт</button>
        </form>
    </div>
@endsection
