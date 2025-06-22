<?php

namespace App\Livewire\Kampanye;

use Livewire\Component;
use App\Models\Kampanye;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $kampanyeIdToDelete = null;

    protected $listeners = ['refreshKampanye' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->kampanyeIdToDelete = $id;
    }

    public function cancelDelete()
    {
        $this->kampanyeIdToDelete = null;
    }

    public function delete()
    {
        if ($this->kampanyeIdToDelete) {
            $kampanye = Kampanye::find($this->kampanyeIdToDelete);
            
            if ($kampanye) {
                $kampanye->delete();
                session()->flash('message', 'Kampanye berhasil dihapus.');
            }
            
            $this->kampanyeIdToDelete = null;
        }
    }

    public function render()
    {
        $kampanyeList = Kampanye::with('kategori')
            ->where('nama_kampanye', 'like', '%' . $this->search . '%')
            ->orderBy('nama_kampanye')
            ->paginate(10);

        return view('livewire.kampanye.index', [
            'kampanyeList' => $kampanyeList
        ]);
    }
}
