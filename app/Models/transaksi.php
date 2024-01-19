<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $fillable = ['setoran_nasabahs_id', 'jenis_transaksi', 'total'];
    use HasFactory;
    public function setoran_nasabahs()
    {
        return $this->belongsTo(setoran_nasabah::class);
    }
}
