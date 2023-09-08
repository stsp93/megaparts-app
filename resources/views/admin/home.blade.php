@extends('admin.app')

@section('content')
    
<div>
    <h2>Admin Panel</h2>
    <p>Hello {{ Auth::user()->email }}</p>
</div>
@endsection