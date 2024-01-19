@extends('layouts.app')
@section('content')
<form action="/admin/store" method="POST">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">NAMA</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">EMAIL</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">PASSWORD</label>
    <input type="text" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="remember_token" class="form-label">REMEMBER TOKEN</label>
    <input type="text" class="form-control" id="remember_token" name="remember_token">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
