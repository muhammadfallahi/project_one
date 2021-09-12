@extends('layouts.main')
@section('title', 'create category')
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
    
<form method="POST" action="{{route('categories.store')}}">
    @csrf
    <div class="mb-3">
      <input type="text" id="title" name="title">
      <label for="title">Title</label>
    </div>

    <button type="submit" class="btn btn-outline-info">Submit</button>
  </form>

@endsection