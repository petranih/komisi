<?php

namespace App\Http\Controllers;

use App\Models\jenis_tabungan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class JenisTabunganController extends Controller
{
    public function index()
    {
        $jenis_tabungan = jenis_tabungan::all();
        return view('komisi.jenis_tabungan', compact('jenis_tabungan'));
    }


    public function create(): View
    {
        return view('komisi.inputtabu');
    }
    public function store(Request $request)
    {
        $post = jenis_tabungan::create([
            'nama_tabungan'     => $request->input('nama_tabungan'),
            'deskripsi'      => $request->input('deskripsi'),
            'batas_minimum_saldo'      => $request->input('batas_minimum_saldo')
        ]);

        return redirect('/jenis');
    }
    function edit(jenis_tabungan $jenis_tabungan)
    {
        return view('komisi/editjen', compact('jenis_tabungan'));
    }
    function update(Request $request, jenis_tabungan $jenis_tabungan)
    {
        $jenis_tabungan->update(
            $request->all()

        );
        return redirect('/jenis');
    }
    public function destroy(jenis_tabungan $jenis_tabungan)
    {
        $jenis_tabungan->delete();
        return redirect('/jenis');
    }
}
