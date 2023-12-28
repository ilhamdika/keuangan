<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function jenis()
    {
        return $this->hasMany(Jenis::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
