@extends('layouts.main')
@section('title', 'user post')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">phone</th>
        <th scope="col">created_at</th>

      </tr>
    </thead>
    <tbody>
        <tr>
           <td>{{$user->id}}</td>
           <td>{{$user->name}}</td>
           <td>{{$user->email}}</td>
           <td>{{$user->phone_number}}</td>
           <td>{{$user->created_at}}</td> 
        </tr>
     </tbody>
</table>
@endsection