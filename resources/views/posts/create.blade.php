@extends('layouts.main')
@section('title', 'create post')
@section('content')
    
<form method="POST" action="{{route('post.store')}}">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">description</label><br>
        <textarea name="description" id="description" rows="4"></textarea>
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection