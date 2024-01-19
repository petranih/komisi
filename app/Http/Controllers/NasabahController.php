<?php

namespace App\Http\Controllers;

use App\Models\nasabah;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use function Laravel\Prompts\table;

class NasabahController extends Controller
{
    public function index()
    {
        $nasabahs = nasabah::all();
        return view('komisi.index', compact('nasabahs'));
    }


    public function create(): View
    {
        $status = ['aktif', 'non_aktif'];
        return view('komisi.tambahdata', compact('status'));
    }
    public function store(Request $request)
    {
        $post = nasabah::create([
            'nama'     => $request->input('nama'),
            'NIM'      => $request->input('NIM'),
            'alamat'      => $request->input('alamat'),
            'nomer_telepon'      => $request->input('nomer_telepon'),
            'status'   => $request->input('status')
        ]);

        return redirect('/komisi');
    }
    function edit(nasabah $nasabah)
    {
        $status = ['aktif', 'non_aktif'];
        return view('komisi/editnas', compact('nasabah', 'status'));
    }
    function update(Request $request, nasabah $nasabah)
    {
        $nasabah->update(
            $request->all()

        );
        return redirect('/komisi');
    }
    public function destroy(nasabah $nasabah)
    {
        $nasabah->delete();
        return redirect('/komisi');
    }
}
