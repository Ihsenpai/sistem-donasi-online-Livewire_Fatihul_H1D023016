<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Kampanye;
use App\Models\Donatur;
use App\Models\Donasi;
use App\Models\TransaksiDonasi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@donasiKu.com',
            'password' => bcrypt('password'),
        ]);

        // Create categories
        $kategoriPendidikan = Kategori::create(['nama_kategori' => 'Pendidikan']);
        $kategoriKesehatan = Kategori::create(['nama_kategori' => 'Kesehatan']);
        $kategoriBencana = Kategori::create(['nama_kategori' => 'Bencana Alam']);
        
        // Create campaigns
        $kampanye1 = Kampanye::create([
            'nama_kampanye' => 'Pendidikan Untuk Semua',
            'kategori_id' => $kategoriPendidikan->id,
            'target' => 50000000,
        ]);
        
        $kampanye2 = Kampanye::create([
            'nama_kampanye' => 'Pelayanan Kesehatan Gratis',
            'kategori_id' => $kategoriKesehatan->id,
            'target' => 75000000,
        ]);
        
        $kampanye3 = Kampanye::create([
            'nama_kampanye' => 'Bantuan Bencana Alam',
            'kategori_id' => $kategoriBencana->id,
            'target' => 100000000,
        ]);
        
        // Create donatur
        $donatur1 = Donatur::create([
            'nama' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'telepon' => '081234567890',
        ]);
        
        $donatur2 = Donatur::create([
            'nama' => 'Siti Aminah',
            'email' => 'siti@example.com',
            'telepon' => '089876543210',
        ]);
        
        // Create donations
        $donasi1 = Donasi::create([
            'donatur_id' => $donatur1->id,
            'kategori_id' => $kategoriPendidikan->id,
            'jumlah' => 5000000,
            'tanggal' => now(),
        ]);
        
        $donasi2 = Donasi::create([
            'donatur_id' => $donatur2->id,
            'kategori_id' => $kategoriKesehatan->id,
            'jumlah' => 10000000,
            'tanggal' => now(),
        ]);
        
        $donasi3 = Donasi::create([
            'donatur_id' => $donatur1->id,
            'kategori_id' => $kategoriBencana->id,
            'jumlah' => 15000000,
            'tanggal' => now(),
        ]);
        
        // Create transactions
        TransaksiDonasi::create([
            'donasi_id' => $donasi1->id,
            'kampanye_id' => $kampanye1->id,
            'status' => 'success',
        ]);
        
        TransaksiDonasi::create([
            'donasi_id' => $donasi2->id,
            'kampanye_id' => $kampanye2->id,
            'status' => 'success',
        ]);
        
        TransaksiDonasi::create([
            'donasi_id' => $donasi3->id,
            'kampanye_id' => $kampanye3->id,
            'status' => 'success',
        ]);
    }
}
