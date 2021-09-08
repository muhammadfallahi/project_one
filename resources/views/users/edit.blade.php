@extends('layouts.main')
@section('title', 'edit user')
@section('content')

@if ($errors->any()) 
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{route('user.update', $user)}}">
    @csrf
    <div class="mb-3">
      <input type="text" id="name" name="name" value="{{$user->name}}">
      <label for="name" class="form-label">Name</label>
    </div>

    <div class="mb-3">
      <input type="email" id="email" name="email" value="{{$user->email}}">
      <label for="email" class="form-label">Email Address</label>
    </div>

    <div class="mb-3">
      <input type="tel" id="phone_number" name="phone_number" value="{{$user->phone_number}}">
      <label for="phone_number" class="form-label">Phone number</label>
    </div>

    <div class="mb-3">
      <input type="password" id="currrent_password" name="current_password">
      <label for="current_password" class="form-label">current Password</label>
    </div>

  <div class="mb-3">
    <input type="password" id="password" name="password">
    <label for="password" class="form-label">new Password</label>
  </div>

  <div class="mb-3">
      <input type="password" id="password_confirmation" name="password_confirmation">
      <label for="password_confirmation" class="form-label">confirm new Password</label>
    </div>


    <button type="submit" class="btn btn-outline-info">Submit</button>
  </form>

@endsection