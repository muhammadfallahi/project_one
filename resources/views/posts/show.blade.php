@extends('layouts.main')
@section('title', 'show post')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">title</th>
        <th scope="col">slug</th>
        <th scope="col">author</th>
        <th scope="col">content</th>
        <th scope="col">tags</th>
        <th scope="col">categories</th>
        <th scope="col">create_at</th>
        <th scope="col">image</th>

      </tr>
    </thead>
    <tbody>
        <tr>
           <td>{{$post->id}}</td>
           <td>{{$post->title}}</td>
           <td>{{$post->slug}}</td>
           <td>{{$post->author}}</td>
           <td>{!!$post->content!!}</td>
           <td>
           @foreach ($post->tags as $tag)
           {{$tag->title}}
           @endforeach
          </td>
          <td>
            @foreach ($post->categories as $category)
            {{$category->title}}
            @endforeach
           </td>
           <td>{{$post->created_at}}</td>
           @foreach ($image as $images)
           <td><img src="{{asset("storage/$images->path")}}" width="50" height="50" alt="{{$images->alt}}"></td> 
           @endforeach
           <td><a href="{{ route('post.edit', $post) }}" class="btn btn-outline-info">Edit</a></td> 
           <td>
            <form method="post" action="{{ route('post.destroy', $post) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger" id="delete" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            </td> 
            <td>
              <form method="post" action="{{ route('post.forceDelete', $post) }}">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-outline-danger" id="delete" type="submit" onclick="return confirm('Are you sure?')">forceDelete</button>
              </form>
              </td> 


        </tr>
     </tbody>
</table>
@endsection