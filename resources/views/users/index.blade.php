@extends('layouts.main')
@section('title', 'users index')
@section('content')

@if (Session('message'))
<div class="alert alert-success" role="alert">
     {{Session('message')}} 
   </div>
 @endif

 <table class="table">
    <thead>
      <tr>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">phone number</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
          <td><a href="{{route('user.show', $user)}}" class="link-info">{{$user->name}}</a></td>
           <td>{{$user->email}}</td>
           <td>{{$user->phone_number}}</td>
        </tr>
        @endforeach
     </tbody>
</table>
@endsection