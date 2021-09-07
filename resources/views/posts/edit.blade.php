@extends('layouts.main')
@section('title', 'edit post')
@section('content')
    
<form method="POST" action="{{route('post.update', $post)}}">
    @csrf
    <div class="mb-3">
      <input type="text" id="title" name="title" value="{{$post->title}}">
      <label for="title">Title</label>
    </div>

    <div class="mb-3">
      <textarea name="description" id="description" rows="4" >{{$post->description}}</textarea>
        <label for="description">description</label><br>
        </div>
        <script>  /* this script use for rich text editor */

          CKEDITOR.replace('description');
    
        </script>

    <button type="submit" class="btn btn-outline-info">Submit</button>
  </form>


@endsection