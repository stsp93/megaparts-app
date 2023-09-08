@extends('layout')

@section('content')
@if(session('error'))
    <div class="alert alert-warning">{{ session('error') }}</div>
@endif
<div class="form container">
    <h2>АДМИНИСТРАТОРСКИ ВХОД</h2>
    <form action="/login" method="post">
        @csrf
      <div class="mb-3">
        <label for="username" class="form-label">Потребител</label>
        <input name='username' type="text" class="form-control rounded-5" id="username" placeholder="Въведете потребител">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Парола</label>
        <input name="password" type="password" class="form-control rounded-5" id="password" placeholder="Въведете парола">
      </div>
      <button type="submit" class="cta loginBtn btn rounded-5">ВХОД</button>
    </form>
  </div>
@endsection
