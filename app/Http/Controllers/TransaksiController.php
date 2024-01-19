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
        $data = $request->validate([
            'setoran_nasabahs_id' => 'required',
            'jenis_transaksi' => 'required',
            'total' => 'required',
        ]);

        $transaksi = new transaksi();
        $transaksi->setoran_nasabahs_id = $data['setoran_nasabahs_id'];
        $transaksi->jenis_transaksi = $data['jenis_transaksi'];
        $transaksi->total = $data['total'];
        $transaksi->save();

        if ($transaksi->jenis_transaksi == 'simpan') {

            $setoranNasabah = $transaksi->setoran_nasabahs;
            $p = $setoranNasabah->jumlah_setoran += $transaksi->total = $data['total'];
            $setoranNasabah->save();
        } else {
            $setoranNasabah = setoran_nasabah::where('nasabahs_id', $transaksi->setoran_nasabahs_id)->get();
            $setoranNasabah = $transaksi->setoran_nasabahs;
            $setoranNasabah->jumlah_setoran -= $transaksi->total = $data['total'];
            $setoranNasabah->save();
        }
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
