<?php

namespace App\Livewire\Kampanye;

use Livewire\Component;
use App\Models\Kampanye;
use App\Models\TransaksiDonasi;
use Illuminate\Support\Facades\DB;

class Progress extends Component
{
    public $kampanyeId;
    public $kampanye;
    public $totalDonasi = 0;
    public $progressPercentage = 0;
    
    public function mount($kampanye)
    {
        $this->kampanyeId = $kampanye;
        $this->loadKampanyeData();
    }
    
    public function loadKampanyeData()
    {
        $this->kampanye = Kampanye::with(['kategori'])->findOrFail($this->kampanyeId);
        
        // Calculate total donations for this campaign
        $this->totalDonasi = TransaksiDonasi::join('donasi', 'transaksi_donasi.donasi_id', '=', 'donasi.id')
            ->where('transaksi_donasi.kampanye_id', $this->kampanyeId)
            ->where('transaksi_donasi.status', 'success')
            ->sum('donasi.jumlah');
            
        // Calculate progress percentage
        if ($this->kampanye->target > 0) {
            $this->progressPercentage = min(100, round(($this->totalDonasi / $this->kampanye->target) * 100));
        }
    }

    public function render()
    {
        // Get the last 10 donations for this campaign
        $recentDonations = TransaksiDonasi::with(['donasi.donatur'])
            ->where('kampanye_id', $this->kampanyeId)
            ->where('status', 'success')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
            
        return view('livewire.kampanye.progress', [
            'recentDonations' => $recentDonations
        ]);
    }
}
