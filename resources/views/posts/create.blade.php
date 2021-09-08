@extends('layouts.main')
@section('title', 'create post')
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
    
<form method="POST" action="{{route('post.store')}}">
    @csrf
    <div class="mb-3">
      <input type="text" id="title" name="title">
      <label for="title">Title</label>
    </div>

    <div class="mb-3">
      <textarea name="description" id="description" rows="4"></textarea>
        <label for="description">description</label><br>
        </div>
        <script>  /* this script use for rich text editor */

          CKEDITOR.replace('description');
    
        </script>

    <button type="submit" class="btn btn-outline-info">Submit</button>
  </form>

@endsection