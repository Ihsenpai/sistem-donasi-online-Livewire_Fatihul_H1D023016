<?php

namespace App\Livewire\Donatur;

use Livewire\Component;
use App\Models\Donatur;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $donaturIdToDelete = null;

    protected $listeners = ['refreshDonatur' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->donaturIdToDelete = $id;
    }

    public function cancelDelete()
    {
        $this->donaturIdToDelete = null;
    }

    public function delete()
    {
        if ($this->donaturIdToDelete) {
            $donatur = Donatur::find($this->donaturIdToDelete);
            
            if ($donatur) {
                // Check if donatur has donations
                if ($donatur->donasi()->count() > 0) {
                    session()->flash('error', 'Donatur tidak dapat dihapus karena memiliki donasi.');
                } else {
                    $donatur->delete();
                    session()->flash('message', 'Donatur berhasil dihapus.');
                }
            }
            
            $this->donaturIdToDelete = null;
        }
    }

    public function render()
    {
        $donaturList = Donatur::where('nama', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('telepon', 'like', '%' . $this->search . '%')
            ->orderBy('nama')
            ->paginate(10);

        return view('livewire.donatur.index', [
            'donaturList' => $donaturList
        ]);
    }
}
