@extends('layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="d-grid col-10">
            <div class="card">
                <div class="card-header">
                    <h5>JENIS TABUNGAN</h5>
                </div>
                <div class="card-body">
                    <table class="table-stripped table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA TABUNGAN</th>
                        <th>DESKRIPSI</th>
                        <th>MINIMAL SALDO</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenis_tabungan as $jtg)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jtg->nama_tabungan }}</td>
                        <td>{{ $jtg->deskripsi }}</td>
                        <td>{{ $jtg->batas_minimum_saldo }}</td>
                        <td>  
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="jenis/{{$jtg->id}}" class="btn btn-outline-secondary" type="button">Update</a>
                                <form action="/jenis/{{$jtg->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                   </form>
                                <div class="card">
                                </td>
                            </tr>
                            @endforeach
                            <a href="jenis/inputtabu" class="btn btn-outline-secondary" type="button">Buat</a>
                </tbody>
            </table>
            {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <div class="card">
        </div> --}}
            </div>
        </div>
    </div>
@endsection
