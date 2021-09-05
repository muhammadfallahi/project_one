@extends('layouts.main')
@section('title', 'login')
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

{{--this is for register successfull message--}}
@if(session('message'))
<div class="alert alert-success" role="alert">{{ session('message') }}</div>
@endif



<form method="POST" action="{{route('auth.login')}}">
    @csrf
  
    <div class="mb-3">
        <input type="text" id="login" name="login">
        <label for="login" class="form-label">Email or phone number</label>
      </div>

    <div class="mb-3">
      <input type="password" id="password" name="password">
      <label for="password" class="form-label">Password</label>
    </div>

    <button type="submit" class="btn">Login</button>
  </form>

    
@endsection