@extends('layouts.main')
@section('title', 'show user')
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
           <td><a href="{{ route('user.edit', $user) }}" class="btn btn-outline-info">Edit</a></td> 
           <td>
            <form method="post" action="{{ route('user.destroy', $user) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger" id="delete" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            </td> 
        </tr>
     </tbody>
</table>
@endsection