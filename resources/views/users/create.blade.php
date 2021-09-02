@extends('layouts.main')
@section('title', 'create user')
@section('content')
    
<form method="POST" action="{{route('user.store')}}">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">FullName</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="number" class="form-control" id="phone" name="phone">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection