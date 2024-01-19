@extends('layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="d-grid col-10">
            <div class="card">
                <div class="card-header">
                    <h5>ADMIN</h5>
                </div>
                <div class="card-body">
                    <table class="table-stripped table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>ALAMAT</th>
                        <th>NO HP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profils as $prf)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $prf->users['name'] }}</td>
                        <td>{{ $prf->alamat }}</td>
                        <td>{{ $prf->no_hp }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="/admin/inputprofil" class="btn btn-outline-secondary" type="button">Buat</a>
                <a href="/admin/inputuser" class="btn btn-outline-secondary" type="button">tambah user</a>
                <div class="card">
        </div>
            </div>
        </div>
    </div>
@endsection
