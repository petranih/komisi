<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nasabah extends Model
{
    protected $fillable = ['nama', 'NIM', 'alamat', 'nomer_telepon', 'status'];
    use HasFactory;
    public function setoran_nasabahs()
    {
        return $this->hasMany(setoran_nasabah::class);
    }
}
