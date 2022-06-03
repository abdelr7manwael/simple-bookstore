@extends('layouts.book-layout')

@section('content')

@if($errors)
@foreach ($errors->all() as $error )
<div class="alert alert-danger">
{{ $error }}
</div>
@endforeach
@endif



<form method="POST" action="{{url('users/savenote')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Note Content</label>
      <input type="text" name="content" value="{{old('content')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <button type="submit" class="btn btn-primary">Add Note</button>
  </form>
@foreach (Auth::user()->notes as $note)

<h4>{{$note->content}} - {{$note->user->email}}</h4>
@endforeach

@endsection
