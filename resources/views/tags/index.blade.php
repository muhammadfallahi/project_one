@extends('layouts.main')
@section('title', 'tags index')
@section('content')
    
       {{-- use this for show tag deleting message --}}
     @if(session('message'))
     <div class="alert alert-success" role="alert">
         {{Session('message')}} 
      </div>
      @endif

     <table class="table">
        <thead>
          <tr>
            <th scope="col">title</th>
            <th scope="col">slug</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
            <tr>
               <td>{{$tag->title}}</td>
               <td>{{$tag->slug}}</td>

            </tr>
            @endforeach
         </tbody>
    </table>
@endsection