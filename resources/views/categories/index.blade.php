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
            <th scope="col">images</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
          @php $images = DB::table('images')->where('imageable_id',$category->id)->get(); @endphp
            <tr>
               <td>{{$category->title}}</td>
               <td>{{$category->slug}}</td>
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