@extends('layouts.book-layout')

@section('content')

@if($errors)
@foreach ($errors->all() as $error )
<div class="alert alert-danger">
{{ $error }}
</div>
@endforeach
@endif



<form method="POST" action="{{url('categories/savecategory')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Category Name</label>
      <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Add Category</button>
  </form>
<div class="mt-4">
    @foreach ($categories as $c )
    <h4>{{$c->name}}</h4>
    @foreach ($c->books as $b )
    {{$b->name.' - '}}
    @endforeach
    @endforeach
</div>

@endsection
