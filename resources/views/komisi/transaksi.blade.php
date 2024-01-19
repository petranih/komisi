@extends('layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="d-grid col-10">
            <div class="card">
                <div class="card-header">
                    <h5>TRANSAKSI</h5>
                </div>
                <div class="card-body">
                    <table class="table-stripped table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NASABAH</th>
                        <th>JENIS TRANSAKSI</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $tr)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tr->setoran_nasabahs->nasabahs_id }}</td>
                        <td>{{ $tr->jenis_transaksi }}</td>
                        <td>{{ $tr->total }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <a href="transaksi/tambahtransaksi" class="btn btn-outline-secondary" type="button">TAMBAH</a>
            </table>
    </div>
@endsection
