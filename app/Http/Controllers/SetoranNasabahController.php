<?php

namespace App\Http\Controllers;

use App\Models\jenis_tabungan;
use App\Models\nasabah;
use App\Models\setoran_nasabah;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class SetoranNasabahController extends Controller
{
    public function index()
    {
        // $setoran_nasabahs = setoran_nasabah::with('nasabahs', 'jenis_tabungans')->get();
        // return view('komisi.setoran_nasabah', compact('setoran_nasabahs'));
        $setoran_nasabahs = setoran_nasabah::latest()->get();
        return view('komisi.setoran_nasabah', compact('setoran_nasabahs'));
    }

    public function create(): View
    {
        $nasabahs = nasabah::all();
        $jenis_tabungans = jenis_tabungan::all();
        return view('komisi.inputseto', compact('nasabahs', 'jenis_tabungans'));
    }
    public function store(Request $request)
    {
        $post = setoran_nasabah::create([
            'nasabahs_id'     => $request->input('nasabahs_id'),
            'jenis_tabungans_id'      => $request->input('jenis_tabungans_id'),
            'jumlah_setoran'      => $request->input('jumlah_setoran'),
            'keterangan'      => $request->input('keterangan')
        ]);
        return redirect('/setoran');
    }
    function edit(setoran_nasabah $setoran_nasabah)
    {
        $nasabahs = nasabah::all();
        $jenis_tabungans = jenis_tabungan::all();
        return view('komisi/editseto', compact('setoran_nasabah', 'nasabahs', 'jenis_tabungans'));
    }
    function update(Request $request, setoran_nasabah $setoran_nasabah)
    {
        $setoran_nasabah->update(
            $request->all()

        );
        return redirect('/setoran');
    }
    public function destroy(setoran_nasabah $setoran_nasabah)
    {
        $setoran_nasabah->delete();
        return redirect('/setoran');
    }
    // public function tarikt(): view
    // {
    //     return view('komisi.tarik');
    // }

    // public function withdraw(Request $request)
    // {
    //     $user = setoran_nasabah::find(auth()->id());

    //     // Validasi saldo cukup untuk penarikan
    //     if ($user->jumlah_setoran >= $request->jumlah_setoran) {
    //         // Lakukan penarikan
    //         $user->jumlah_setoran -= $request->jumlah_setoran;
    //         $user->save();

    //         return redirect()->route('/setoran')->with('success', 'Penarikan berhasil.');
    //     } else {
    //         return redirect()->route('/setoran')->with('error', 'Saldo tidak mencukupi.');
    //     }
    // }
}
