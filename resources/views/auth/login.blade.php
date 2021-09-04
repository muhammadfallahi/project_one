@extends('layouts.main')
@section('title', 'login')
@section('content')

<link href="{{ asset('css/login.css') }}" rel="stylesheet">

@if(session('message'))
<div class="alert alert-danger" role="alert">{{ session('message') }}</div>
@endif

<form method="POST" action="{{route('auth.login')}}">
    @csrf
  
    <div class="mb-3">
        <input type="text" id="login" name="login" class="form-control">
        <label for="login" class="form-label">Email or phone number</label>
      </div>

    <div class="mb-3">
      <input type="password" id="password" name="password" class="form-control">
      <label for="password" class="form-label">Password</label>
    </div>

    <button type="submit" class="btn">Login</button>
  </form>

    
@endsection