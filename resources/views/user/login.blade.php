@extends('layout')

@section('content')
@if(session('error'))
    <div class="alert alert-warning">{{ session('error') }}</div>
@endif
<div class="form container">
    <h2>ВХОД</h2>
    <form action="/login" method="post">
        @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Имейл</label>
        <input name='email' type="email" class="form-control rounded-5" id="email" placeholder="Въведете Имейл">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Парола</label>
        <input name="password" type="password" class="form-control rounded-5" id="password" placeholder="Въведете парола">
      </div>
      <button type="submit" class="cta loginBtn btn rounded-5">ВХОД</button>
    </form>
    <a href="/register" class="link-primary">Нямате регистрация?</a>
  </div>
@endsection

