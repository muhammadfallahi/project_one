@extends('layouts.main')
@section('title', 'categories index')
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
            @foreach ($categories as $category)
            <tr>
               <td>{{$category->title}}</td>
               <td>{{$category->slug}}</td>

            </tr>
            @endforeach
         </tbody>
    </table>
@endsection