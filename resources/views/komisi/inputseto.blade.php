@extends('layouts.app')
@section('content')
<form action="/setoran/store" method="POST">
  @csrf
  <label for="nasabahs_id">nasabah</label>
                <select name="nasabahs_id" class="form-control" required>
                    <option value="" disabled selected>pilih nasabah</option>
                    @foreach($nasabahs as $ns)
                        <option value="{{ $ns->id }}">{{ $ns->nama }}</option>
                    @endforeach
                </select>
  <label for="jenis_tabungans_id">jenis tabungan</label>
                <select name="jenis_tabungans_id" class="form-control" required>
                    <option value="" disabled selected>pilih tabungan</option>
                    @foreach($jenis_tabungans as $jt)
                        <option value="{{ $jt->id }}">{{ $jt->nama_tabungan }}</option>
                    @endforeach
                </select>
  <div class="mb-3">
    <label for="jumlah_setoran" class="form-label">Jumlah Setoran</label>
    <input type="text" class="form-control" id="jumlah_setoran" name="jumlah_setoran">
  </div>
  <div class="mb-3">
    <label for="keterangan" class="form-label">Keterangan</label>
    <input type="text" class="form-control" id="keterangan" name="keterangan">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
