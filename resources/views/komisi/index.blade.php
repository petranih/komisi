@extends('layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="d-grid col-10">
            <div class="card">
                <div class="card-header">
                    <h5>Data Nasabah</h5>
                </div>
                <div class="card-body">
                    <table class="table-stripped table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>NIM</th>
                        <th>ALAMAT</th>
                        <th>NO.HP</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nasabahs as $nsb)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $nsb->nama }}</td>
                        <td>{{ $nsb->NIM }}</td>
                        <td>{{ $nsb->alamat }}</td>
                        <td>{{ $nsb->nomer_telepon}}</td>
                        <td>{{ $nsb->status}}</td>
                        <td>  
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="komisi/{{$nsb->id}}" class="btn btn-outline-secondary" type="button">Update</a>
                                <form action="/komisi/{{$nsb->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                   </form>
                                <div class="card">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <a href="komisi/tambahdata" class="btn btn-outline-secondary" type="button">Buat</a>
            </table>
        </div>
            </div>
        </div>
    </div>
@endsection
