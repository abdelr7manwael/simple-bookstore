@extends('layouts.book-layout')

@section('content')

@if($errors)
@foreach ($errors->all() as $error )
<div class="alert alert-danger">
{{ $error }}
</div>
@endforeach
@endif



<form method="POST" action="{{url('/books/store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Book Name</label>
      <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <textarea type="text" name='desc'  class="form-control" id="exampleInputPassword1" >{{old('desc')}}</textarea>
    </div>
    <div class="form-group">
    <label for="img">Book Image</label><br>
    <input type="file" name="img" id="img" src="" alt=""><br><br>
    </div>
    <div>

        @foreach ($cat as $c )
        <input type="checkbox" name="categories[]" id="" value="{{$c->id}}"> {{$c->name}}
        @endforeach
    </div>
  <br>
    <button type="submit" class="btn btn-primary">Add Book</button>
  </form>



@endsection
