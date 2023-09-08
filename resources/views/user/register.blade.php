@extends('layout')

@section('content')

<div class="form container">
    <h2>РЕГИСТРАЦИЯ</h2>
    <form action="/register" method="post">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Имейл</label>
        <input name="email" type="email" class="form-control rounded-5" id="email" placeholder="Въведете Имейл">
        @error('email')
            <p class="text-danger">Името трябва да е поне 3 символа</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Парола</label>
        <input name="password" type="password" class="form-control rounded-5" id="password" placeholder="Въведете парола">
        @error('password')
            <p class="text-danger">Паролата трябва да e поне 3 символа</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password_conformation" class="form-label">Повтори паролата</label>
        <input name="password_conformation" type="password" class="form-control rounded-5" id="password_conformation" placeholder="Въведете паролата отново">
        @error('password_conformation')
            <p class="text-danger">Паролата трябва да съвпада</p>
        @enderror
      </div>
      <button type="submit" class="cta registerBtn btn rounded-5">РЕГИСТРАЦИЯ</button>
    </form>
    <a href="/login" class="link-success">Имате регистрация?</a>
  </div>
@endsection