<?php

namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori;

class Form extends Component
{
    public $kategoriId;
    public $nama_kategori;
    public $isEdit = false;

    protected $rules = [
        'nama_kategori' => 'required|string|max:255',
    ];

    public function mount($kategori = null)
    {
        if ($kategori) {
            $kategoriData = Kategori::findOrFail($kategori);
            $this->kategoriId = $kategoriData->id;
            $this->nama_kategori = $kategoriData->nama_kategori;
            $this->isEdit = true;
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->isEdit) {
            $kategori = Kategori::find($this->kategoriId);
            $kategori->update([
                'nama_kategori' => $this->nama_kategori,
            ]);
            session()->flash('message', 'Kategori berhasil diperbarui.');
        } else {
            Kategori::create([
                'nama_kategori' => $this->nama_kategori,
            ]);
            session()->flash('message', 'Kategori berhasil ditambahkan.');
        }

        $this->reset('nama_kategori');
        $this->dispatch('refreshKategori');
        
        return redirect()->route('kategori.index');
    }

    public function render()
    {
        return view('livewire.kategori.form');
    }
}
