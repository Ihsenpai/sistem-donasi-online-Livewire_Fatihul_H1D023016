<?php

namespace App\Livewire\Kampanye;

use Livewire\Component;
use App\Models\Kampanye;
use App\Models\Kategori;

class Form extends Component
{
    public $kampanyeId;
    public $nama_kampanye;
    public $kategori_id;
    public $target;
    public $isEdit = false;
    
    protected $rules = [
        'nama_kampanye' => 'required|string|max:255',
        'kategori_id' => 'required|exists:kategori,id',
        'target' => 'required|numeric|min:1000',
    ];

    public function mount($kampanye = null)
    {
        if ($kampanye) {
            $kampanyeData = Kampanye::findOrFail($kampanye);
            $this->kampanyeId = $kampanyeData->id;
            $this->nama_kampanye = $kampanyeData->nama_kampanye;
            $this->kategori_id = $kampanyeData->kategori_id;
            $this->target = $kampanyeData->target;
            $this->isEdit = true;
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->isEdit) {
            $kampanye = Kampanye::find($this->kampanyeId);
            $kampanye->update([
                'nama_kampanye' => $this->nama_kampanye,
                'kategori_id' => $this->kategori_id,
                'target' => $this->target,
            ]);
            session()->flash('message', 'Kampanye berhasil diperbarui.');
        } else {
            Kampanye::create([
                'nama_kampanye' => $this->nama_kampanye,
                'kategori_id' => $this->kategori_id,
                'target' => $this->target,
            ]);
            session()->flash('message', 'Kampanye berhasil ditambahkan.');
        }

        $this->reset(['nama_kampanye', 'kategori_id', 'target']);
        $this->dispatch('refreshKampanye');
        
        return redirect()->route('kampanye.index');
    }

    public function render()
    {
        $kategoriList = Kategori::orderBy('nama_kategori')->get();
        
        return view('livewire.kampanye.form', [
            'kategoriList' => $kategoriList
        ]);
    }
}
