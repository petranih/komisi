<?php

namespace App\Http\Controllers;

use App\Models\setoran_nasabah;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = transaksi::with('setoran_nasabahs')->get();
        // $setoran_nasabahs = setoran_nasabah::latest()->get();
        return view('komisi.transaksi', compact('transaksis'));
    }
    public function create()
    {

        $jenis_transaksi = ['debet', 'simpan'];
        $transaksis = transaksi::with('setoran_nasabahs');
        $setoran_nasabahs_id = setoran_nasabah::all();
        return view('komisi.tambahtransaksi', compact('transaksis', 'jenis_transaksi', 'setoran_nasabahs_id'));
    }
    public function store(Request $request)
    {
        $post = transaksi::create([
            'setoran_nasabahs_id'     => $request->input('setoran_nasabahs_id'),
            'jenis_transaksi'      => $request->input('jenis_transaksi'),
            'total'      => $request->input('total')
        ]);
        $this->validate($request, [
            'total' => 'required',
            'jenis_transaksi' => 'required'
        ]);
        return redirect('/transaksi');
    }
    // public function transaksi(Request $request)
    // {
    //     $this->validate($request, [
    //         'total' => 'required',
    //         'jenis_transaksi' => 'required'
    //     ]);
    //     $jenis = $request->jenis_transaksi;
    //     $id = $request->nasabah_id;
    //     $nasabah = Nasabah::find($id);
    //     $saldo = $nasabah->saldo_akhir;
    //     $status = $nasabah->status_pinjaman;
    //     $sisa_kas = \DB::table('sisa_kas')->first();
    //     if ($jenis == 'debet') {
    //         if ($sisa_kas < $request->total) {
    //             $pesan = 'Mohon maaf dana belum tersedia!!';
    //         } elseif ($saldo < $request->total) {
    //             $pesan = 'Mohon maaf simpanan tidak cukup!!';
    //         } elseif ($status == '1') {
    //             $pesan = 'Mohon maaf tidak bisa melakukan penarikan, masih ada pinjaman!!';
    //         } else {
    //             $nsaldo =  ($saldo - $request->total);
    //             $nasabah->saldo_akhir = $nsaldo;
    //             $nasabah->save();
    //             $pesan = 'Simpanan sudah didebit';
    //             $transaksi = new Transaksi($request->all());
    //             \Auth::user()->opTrans()->save($transaksi);
    //         }
    //     } elseif ($jenis == 'denda') {
    //         if ($saldo < $request->total) {
    //             $pesan = 'Mohon maaf simpanan tidak cukup!!';
    //         } else {
    //             $nsaldo =  ($saldo - $request->total);
    //             $nasabah->saldo_akhir = $nsaldo;
    //             $nasabah->save();
    //             $pesan = 'Denda sudah dikurangi dari simpanan';
    //             $transaksi = new Transaksi($request->all());
    //             \Auth::user()->opTrans()->save($transaksi);
    //         }
    //     } else {
    //         $nsaldo =  ($saldo + $request->total);
    //         $nasabah->saldo_akhir = $nsaldo;
    //         $nasabah->save();
    //         $pesan = 'Simpanan sudah ditambahkan';
    //         $transaksi = new Transaksi($request->all());
    //         \Auth::user()->opTrans()->save($transaksi);
    //     }
    //     Session::flash('pesan', $pesan);
    //     return redirect("nasabah/$request->nasabah_id");
    // }
}
