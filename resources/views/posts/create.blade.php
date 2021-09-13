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
    
<form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <input type="text" id="title" name="title">
      <label for="title">Title</label>
    </div>

    <div class="mb-3">
      <textarea name="content" id="content" rows="4"></textarea>
        <label for="content">content</label><br>
        </div>
        <script>  /* this script use for rich text editor */

          CKEDITOR.replace('content');
    
        </script>

<select class="form-select" name="tags_id[]" multiple>
  <option selected disabled>select tag</option>
  @foreach ($tags as $tag)
  <option value={{$tag->id}}>{{$tag->title}}</option>
  @endforeach
</select>

<select class="form-select mt-5" name="categories_id[]" multiple>
  <option selected disabled>select category</option>
  @foreach ($categories as $category)
  <option value={{$category->id}}>{{$category->title}}</option>
  @endforeach
</select><br><br>


<div class="mb-3">
  <input type="text" id="alt" name="alt">
  <label for="alt">description for image</label>
</div>
<div class="mb-3">
  <input type="file" name="image">
  <label for="image">select image</label>
</div>


    <button type="submit" class="btn btn-outline-info mt-3">Submit</button>
  </form>

@endsection