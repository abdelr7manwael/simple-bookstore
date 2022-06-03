@extends('layouts.book-layout')

@section('content')
@if (Auth::user()->is_admin == 1)
<a href="{{url('/books/edit',$book->id)}}">Edit</a>|<a href="{{url('/books/delete',$book->id)}}">Delete</a>

@endif
<h1>{{$book->name}}</h1>
<p>{{$book->desc}}</p>
<img class="img-fluid " src="{{asset("images/$book->image")}}" width='500' alt="No Photo">
<p>
@foreach ($book->categories as $c )
{{$c->name.', '}}
@endforeach
</p>
@endsection
