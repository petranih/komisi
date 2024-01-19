@extends('layouts.app')
@section('content')
<form action="/admin/input" method="POST">
  @csrf
  <label for="users_id">user</label>
                <select name="users_id" class="form-control" required>
                    <option value="" disabled selected>pilih user</option>
                    @foreach($users as $us)
                        <option value="{{ $us->id }}">{{ $us->name }}</option>
                    @endforeach
                </select>
  <div class="mb-3">
    <label for="alamat" class="form-label">alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat">
  </div>
  <div class="mb-3">
    <label for="no_hp" class="form-label">no hp</label>
    <input type="text" class="form-control" id="no_hp" name="no_hp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
