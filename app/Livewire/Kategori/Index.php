<?php

namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $kategoriIdToDelete = null;

    protected $listeners = ['refreshKategori' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->kategoriIdToDelete = $id;
    }

    public function cancelDelete()
    {
        $this->kategoriIdToDelete = null;
    }

    public function delete()
    {
        if ($this->kategoriIdToDelete) {
            $kategori = Kategori::find($this->kategoriIdToDelete);
            
            if ($kategori) {
                $kategori->delete();
                session()->flash('message', 'Kategori berhasil dihapus.');
            }
            
            $this->kategoriIdToDelete = null;
        }
    }

    public function render()
    {
        $kategoriList = Kategori::where('nama_kategori', 'like', '%' . $this->search . '%')
            ->orderBy('nama_kategori')
            ->paginate(10);

        return view('livewire.kategori.index', [
            'kategoriList' => $kategoriList
        ]);
    }
}
