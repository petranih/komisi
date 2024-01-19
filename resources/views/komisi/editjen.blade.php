@extends('layouts.app')
@section('content')
<form action="/jenis/{{$jenis_tabungan->id}}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="nama_tabungan" class="form-label">Nama Tabungan</label>
    <input type="text" class="form-control" id="nama_tabungan" name="nama_tabungan" value="{{$jenis_tabungan->nama_tabungan}}">
  </div>
  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{$jenis_tabungan->deskripsi}}">
  </div>
  <div class="mb-3">
    <label for="batas_minimum_saldo" class="form-label">Batas Minimum Saldo</label>
    <input type="text" class="form-control" id="batas_minimum_saldo" name="batas_minimum_saldo" value="{{$jenis_tabungan->batas_minimum_saldo}}">
  {{-- </div>
  <div class="mb-3">
    <label for="nomer_telepon" class="form-label">NOMER TELEPON</label>
    <input type="text" class="form-control" id="nomer_telepon" name="nomer_telepon" value="{{$jenis_tabungan->nomer_telepon}}">
  </div>
  <label for="status">Status</label>
                <select name="status" value="{{$jenis_tabungan->status}}" class="form-control" required>
                    {{-- <option  disabled selected></option> --}}
                    {{-- @foreach($status as $st)
                        <option value="{{ $st }}">{{ ucfirst($st) }}</option>
                    @endforeach
                </select> --}} 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
