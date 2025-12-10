<?php

namespace App\Livewire\Donatur;

use Livewire\Component;
use App\Models\Donatur;
use App\Models\Donasi;

class History extends Component
{
    public $donaturId;
    public $donatur;
    
    public function mount($donatur)
    {
        $this->donaturId = $donatur;
        $this->donatur = Donatur::findOrFail($this->donaturId);
    }

    public function render()
    {
        $donasiList = Donasi::with(['kategori', 'transaksiDonasi.kampanye'])
            ->where('donatur_id', $this->donaturId)
            ->orderBy('tanggal', 'desc')
            ->get();
            
        // Calculate totals
        $totalDonation = $donasiList->sum('jumlah');
        $donationCount = $donasiList->count();
        
        return view('livewire.donatur.history', [
            'donasiList' => $donasiList,
            'totalDonation' => $totalDonation,
            'donationCount' => $donationCount
        ]);
    }
}
