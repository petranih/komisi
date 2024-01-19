@extends('layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="d-grid col-10">
            <div class="card">
                <div class="card-header">
                    <h5>TRANSAKSI NASABAH</h5>
                </div>
                <div class="card-body">
                    <table class="table-stripped table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NASABAH</th>
                        <th>JENIS TABUNGAN</th>
                        <th>SALDO</th>
                        <th>KETERANGAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($setoran_nasabahs as $sn)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sn->nasabahs['nama'] }}</td>
                        <td>{{ $sn->jenis_tabungans['nama_tabungan'] }}</td>
                        <td>{{ $sn->jumlah_setoran }}</td>
                        <td>{{ $sn->keterangan }}</td>
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                             <a href="setoran/{{$sn->id}}" class="btn btn-outline-secondary" type="button">SETOR</a>
                             <a href="setoran/tarik" class="btn btn-outline-secondary" type="button">TARIK</a>
                                <form action="/setoran/{{$sn->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                   </form>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <a href="setoran/inputseto" class="btn btn-outline-secondary" type="button">TAMBAH</a>
            </table>
    </div>
@endsection
