@extends('layouts.book-layout')

@section('content')
<div>

    @foreach ($Books as $book )

    {{-- <a href="{{url('/books/edit',$book->id)}}">Edit</a>|<a href="{{url('/books/delete',$book->id)}}">Delete</a> --}}
    <h1><a href="{{url('books/show',$book->id)}}">{{$book->name}}</a>  </h1>
    <p> {{$book->desc}}</p>
    <hr>
    @endforeach


</div>
@endsection
