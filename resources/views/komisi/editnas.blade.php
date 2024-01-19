@extends('layouts.app')
@section('content')
<form action="/komisi/{{$nasabah->id}}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" value="{{$nasabah->nama}}">
  </div>
  <div class="mb-3">
    <label for="NIM" class="form-label">NIM</label>
    <input type="text" class="form-control" id="NIM" name="NIM" value="{{$nasabah->NIM}}">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">ALAMAT</label>
    <input type="text" class="form-control" id="alamat" name="alamat" value="{{$nasabah->alamat}}">
  </div>
  <div class="mb-3">
    <label for="nomer_telepon" class="form-label">NOMER TELEPON</label>
    <input type="text" class="form-control" id="nomer_telepon" name="nomer_telepon" value="{{$nasabah->nomer_telepon}}">
  </div>
  <label for="status">Status</label>
                <select name="status" value="{{$nasabah->status}}" class="form-control" required>
                    {{-- <option  disabled selected></option> --}}
                    @foreach($status as $st)
                        <option value="{{ $st }}">{{ ucfirst($st) }}</option>
                    @endforeach
                </select>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
