@extends('layouts.main')
@section('title', 'posts index')
@section('content')
    

    @if (Session('title'))
    <div class="alert alert-success" role="alert">
         post {{Session('title')}} create successfully!
       </div>
     @endif

     <table class="table">
        <thead>
          <tr>
            <th scope="col">title</th>
            <th scope="col">Description</th>
            <th scope="col">create_at</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
               <td>{{$post->title}}</td>
               <td>{{Str::substr($post->description, 0, 20)}}</td>
               <td>{{$post->created_at}}</td>
            </tr>
            @endforeach
         </tbody>
    </table>
@endsection