<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDonasi extends Model
{
    use HasFactory;
    protected $table = 'transaksi_donasi';
    protected $fillable = ['donasi_id', 'kampanye_id', 'status'];

    // Relasi: TransaksiDonasi → belongsTo Donasi
    public function donasi()
    {
        return $this->belongsTo(Donasi::class, 'donasi_id');
    }

    // Relasi: TransaksiDonasi → belongsTo Kampanye
    public function kampanye()
    {
        return $this->belongsTo(Kampanye::class, 'kampanye_id');
    }
}
