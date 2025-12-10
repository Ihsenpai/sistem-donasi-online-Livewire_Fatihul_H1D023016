<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;
    protected $table = 'donasi';
    protected $fillable = ['donatur_id', 'kategori_id', 'jumlah', 'tanggal'];

    // Relasi: Donasi → belongsTo Donatur
    public function donatur()
    {
        return $this->belongsTo(Donatur::class, 'donatur_id');
    }

    // Relasi: Donasi → belongsTo Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Relasi: Donasi memiliki banyak TransaksiDonasi
    public function transaksiDonasi()
    {
        return $this->hasMany(TransaksiDonasi::class, 'donasi_id');
    }
}
