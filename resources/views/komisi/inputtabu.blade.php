@extends('layouts.app')
@section('content')
<form action="/jenis/store" method="POST">
  @csrf
  <div class="mb-3">
    <label for="nama_tabungan" class="form-label">NAMA TABUNGAN</label>
    <input type="text" class="form-control" id="nama_tabungan" name="nama_tabungan">
  </div>
  <div class="mb-3">
    <label for="deskripsi" class="form-label">DESKRIPSI</label>
    <input type="text" class="form-control" id="deskripsi" name="deskripsi">
  </div>
  <div class="mb-3">
    <label for="batas_minimum_saldo" class="form-label">BATAS MINIMAL SALDO</label>
    <input type="text" class="form-control" id="batas_minimum_saldo" name="batas_minimum_saldo">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
