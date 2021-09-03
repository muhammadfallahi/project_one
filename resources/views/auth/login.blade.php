@extends('layouts.main')
@section('title', 'login')
@section('content')

@if(session('message'))
<div class="alert alert-danger" role="alert">{{ session('message') }}</div>
@endif

<form method="POST" action="{{route('auth.login')}}">
    @csrf
  
    <div class="mb-3">
        <label for="login" class="form-label">Email or phone number</label>
        <input type="text" class="form-control" id="login" name="login">
      </div>

    {{-- <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="number" class="form-control" id="phone" name="phone">
    </div> --}}

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
  </form>

    
@endsection