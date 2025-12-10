<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;
    protected $table = 'donatur';
    protected $fillable = ['nama', 'email', 'telepon'];

    // Relasi: Donatur memiliki banyak Donasi
    public function donasi()
    {
        return $this->hasMany(Donasi::class, 'donatur_id');
    }
}