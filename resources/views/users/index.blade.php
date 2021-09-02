@extends('layouts.main')
@section('title', 'users index')
@section('content')
    
@foreach ($users as $user)
    {{$user->id . ":"}}{{$user->name}}
@endforeach

@endsection