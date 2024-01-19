<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setoran_nasabah extends Model
{
    protected $fillable = ['nasabahs_id', 'jenis_tabungans_id', 'jumlah_setoran', 'keterangan'];
    use HasFactory;
    public function nasabahs()
    {
        return $this->belongsTo(nasabah::class);
    }
    public function jenis_tabungans()
    {
        return $this->belongsTo(jenis_tabungan::class);
    }
    public function transaksi()
    {
        return $this->hasOne(transaksi::class);
    }
}
