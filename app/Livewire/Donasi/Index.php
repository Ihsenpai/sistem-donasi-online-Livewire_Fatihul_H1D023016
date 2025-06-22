<?php

namespace App\Livewire\Donasi;

use Livewire\Component;
use App\Models\Donasi;
use App\Models\TransaksiDonasi;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $donasiIdToDelete = null;

    protected $listeners = ['refreshDonasi' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->donasiIdToDelete = $id;
    }

    public function cancelDelete()
    {
        $this->donasiIdToDelete = null;
    }

    public function delete()
    {
        if ($this->donasiIdToDelete) {
            $donasi = Donasi::find($this->donasiIdToDelete);
            
            if ($donasi) {
                // Delete related transaction first
                TransaksiDonasi::where('donasi_id', $donasi->id)->delete();
                
                // Delete the donation
                $donasi->delete();
                session()->flash('message', 'Donasi berhasil dihapus.');
            }
            
            $this->donasiIdToDelete = null;
        }
    }

    public function render()
    {
        $donasiList = Donasi::with(['donatur', 'kategori', 'transaksiDonasi.kampanye'])
            ->whereHas('donatur', function($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('kategori', function($query) {
                $query->where('nama_kategori', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.donasi.index', [
            'donasiList' => $donasiList
        ]);
    }
}
