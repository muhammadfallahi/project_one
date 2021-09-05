@extends('layouts.main')
@section('title', 'register')
@section('content')

<link href="{{ asset('css/login.css') }}" rel="stylesheet">

{{-- use it for show validation errors--}}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<form method="POST" action="{{route('auth.register')}}">
    @csrf
  
    <div class="mb-3">
        <input type="text" id="name" name="name">
        <label for="name" class="form-label">Name</label>
      </div>

      <div class="mb-3">
        <input type="email" id="email" name="email">
        <label for="email" class="form-label">Email Address</label>
      </div>

      <div class="mb-3">
        <input type="tel" id="phone" name="phone">
        <label for="phone" class="form-label">Phone number</label>
      </div>

    <div class="mb-3">
      <input type="password" id="password" name="password">
      <label for="password" class="form-label">Password</label>
    </div>

    <div class="mb-3">
        <input type="password" id="password_confirmation" name="password_confirmation">
        <label for="password_confirmation" class="form-label">confirm Password</label>
      </div>

    <button type="submit" class="btn">register</button>
  </form>

    
@endsection