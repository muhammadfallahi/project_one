@extends('layouts.main')
@section('title', 'show post')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">title</th>
        <th scope="col">Description</th>
        <th scope="col">create_at</th>
      </tr>
    </thead>
    <tbody>
        <tr>
           <td>{{$post->id}}</td>
           <td>{{$post->title}}</td>
           <td>{{$post->description}}</td>
           <td>{{$post->created_at}}</td> 
        </tr>
     </tbody>
</table>
@endsection