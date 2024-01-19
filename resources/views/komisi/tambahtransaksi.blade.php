@extends('layouts.app')
@section('content')
<form action="/transaksi/store" method="POST">
  @csrf
  <label for="setoran_nasabahs_id">nasabah</label>
                <select name="setoran_nasabahs_id" class="form-control" required>
                    <option value="" disabled selected>pilih nasabah</option>
                    @foreach($setoran_nasabahs_id as $sn)
                        <option value="{{ $sn->id }}">{{ $sn->nasabahs_id }}</option>
                    @endforeach
                </select>
  <label for="jenis_transaksi">Jenis Transaksi</label>
                <select name="jenis_transaksi" class="form-control" required>
                    <option value="" disabled selected>Select Status</option>
                    @foreach($jenis_transaksi as $jt)
                        <option value="{{ $jt }}">{{ ucfirst($jt) }}</option>
                    @endforeach
                </select>
  <div class="mb-3">
    <label for="total" class="form-label">Total</label>
    <input type="text" class="form-control" id="total" name="total">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
