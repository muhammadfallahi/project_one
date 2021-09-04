@extends('layouts.main')
@section('title', 'posts index')
@section('content')
    
@foreach ($posts as $post)
    {{$post->id . ":"}}{{$post->title}}
@endforeach

@endsection