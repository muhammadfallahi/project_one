@extends('layouts.main')
@section('title', 'edit post')
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
    
<form method="POST" action="{{route('post.update', $post)}}">
    @csrf
    <div class="mb-3">
      <input type="text" id="title" name="title" value="{{$post->title}}">
      <label for="title">Title</label>
    </div>

    <div class="mb-3">
      <textarea name="content" id="content" rows="4" >{{$post->content}}</textarea>
        <label for="content">content</label><br>
        </div>
        <script>  /* this script use for rich text editor */

          CKEDITOR.replace('content');
    
        </script>

    <button type="submit" class="btn btn-outline-info">Submit</button>
  </form>


@endsection