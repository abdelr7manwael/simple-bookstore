@extends('layouts.book-layout')

@section('content')

@if($errors)
@foreach ($errors->all() as $error )
<div class="alert alert-danger">
{{ $error }}
</div>
@endforeach
@endif



<form method="POST" action="{{url('/books/update',$book->id)}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Book Name</label>
      <input type="text" name="name" value="{{$book->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <textarea type="text" name='desc'  class="form-control" id="exampleInputPassword1" >{{$book->desc}}</textarea>
    </div>
    <label for="img">Book Image </label><br>
    <input type="file" name="img" id="img" src="" alt=""><br><br>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>

@endsection
