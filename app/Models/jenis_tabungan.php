<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_tabungan extends Model
{
    protected $fillable = ['nama_tabungan', 'deskripsi', 'batas_minimum_saldo'];
    use HasFactory;
    public function setoran_nasabahs()
    {
        return $this->hasMany(setoran_nasabah::class);
    }
}
