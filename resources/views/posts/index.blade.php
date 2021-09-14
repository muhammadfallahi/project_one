@extends('layouts.main')
@section('title', 'posts index')
@section('content')
    
       {{-- use this for show post deleting message --}}
     @if(session('message'))
     <div class="alert alert-success" role="alert">
         {{Session('message')}} 
      </div>
      @endif

     <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
        <th scope="col">title</th>
        <th scope="col">content</th>
        <th scope="col">slug</th>
        <th scope="col">author</th>
        <th scope="col">tags</th>
        <th scope="col">categories</th>
        <th scope="col">create_at</th>
        <th scope="col">image</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
          @php $images = DB::table('images')->where('imageable_id',$post->id)->get(); @endphp
            <tr>
              <td>{{$post->id}}</td>
              <td><a href="{{route('post.show', $post)}}" class="link-info">{{$post->title}}</a></td>
               <td>{!!Str::substr($post->content, 0, 20)!!}</td>
              <td>{{$post->slug}}</td>
              <td>{{$post->author}}</td>
              <td>
                @foreach ($post->tags as $tag)
                {{$tag->title . ','}}
                @endforeach
               </td>
               <td>
                @foreach ($post->categories as $category)
                {{$category->title}}
                @endforeach
               </td>
               <td>{{$post->created_at}}</td>
               <td>
                @foreach ($images as $image)
                <img src="{{asset("storage/$image->path")}}" width="50" height="50" alt="{{$image->alt}}">
                @endforeach
               </td> 
            </tr>
            @endforeach
         </tbody>
    </table>
@endsection