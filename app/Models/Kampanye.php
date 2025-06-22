<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampanye extends Model
{
    use HasFactory;
    protected $table = 'kampanye';
    protected $fillable = ['kategori_id', 'nama_kampanye', 'target'];

    // Relasi: Kampanye → belongsTo Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Relasi: Kampanye memiliki banyak TransaksiDonasi
    public function transaksiDonasi()
    {
        return $this->hasMany(TransaksiDonasi::class, 'kampanye_id');
    }
}
