@extends('layouts.app')
@section('content')
<form action="/setoran/{{$setoran_nasabah->id}}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="jumlah_setoran" class="form-label">Jumlah Setoran</label>
    <input type="text" class="form-control" id="jumlah_setoran" name="jumlah_setoran" value="{{$setoran_nasabah->jumlah_setoran}}">
    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{$setoran_nasabah->keterangan}}">
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
