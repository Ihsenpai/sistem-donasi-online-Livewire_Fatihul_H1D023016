<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori'];

    // Relasi: Kategori memiliki banyak Kampanye
    public function kampanye()
    {
        return $this->hasMany(Kampanye::class, 'kategori_id');
    }

    // Relasi: Kategori memiliki banyak Donasi
    public function donasi()
    {
        return $this->hasMany(Donasi::class, 'kategori_id');
    }
}
