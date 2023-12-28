<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['jenis_id', 'kategori_id', 'tanggal', 'nominal', 'deskripsi'];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
