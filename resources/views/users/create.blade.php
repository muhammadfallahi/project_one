@extends('layouts.main')
@section('title', 'create user')
@section('content')
    
<form method="POST" action="{{route('user.store')}}">
    @csrf
    <div class="mb-3">
      <input type="text" id="name" name="name">
      <label for="name">FullName</label>
    </div>

    <div class="mb-3">
      <input type="email" id="email" name="email">
      <label for="email">Email address</label>
      </div>

    <div class="mb-3">
      <input type="number" id="phone" name="phone">
      <label for="phone">Phone Number</label>
    </div>

    <div class="mb-3">
      <input type="password" id="password" name="password">
      <label for="password">Password</label>
    </div>

    <button type="submit" class="btn btn-outline-info">Submit</button>
  </form>

@endsection