@extends('layouts/book-layout')

@section('content')
<h1>Register</h1>
<form action="{{url('users/store')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
      {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>

    <button type="submit" class="btn btn-primary">Register</button>
  </form>

@endsection
