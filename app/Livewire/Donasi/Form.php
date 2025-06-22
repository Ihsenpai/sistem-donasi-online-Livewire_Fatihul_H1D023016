<?php

namespace App\Livewire\Donasi;

use Livewire\Component;
use App\Models\Donasi;
use App\Models\Donatur;
use App\Models\Kategori;
use App\Models\Kampanye;
use App\Models\TransaksiDonasi;
use Illuminate\Support\Facades\DB;

class Form extends Component
{
    public $donasiId;
    public $donatur_id;
    public $kategori_id;
    public $kampanye_id;
    public $jumlah;
    public $tanggal;
    public $isEdit = false;
    
    // For new donatur
    public $nama;
    public $email;
    public $telepon;
    public $createNewDonatur = false;
    
    protected $rules = [
        'kampanye_id' => 'required|exists:kampanye,id',
        'jumlah' => 'required|numeric|min:1000',
        'tanggal' => 'required|date',
        'kategori_id' => 'required|exists:kategori,id',
    ];

    public function mount($donasi = null)
    {
 
        $this->tanggal = date('Y-m-d');
        
        // Check if kampanye_id is passed through query parameter
        if (request()->has('kampanye_id')) {
            $this->kampanye_id = request('kampanye_id');
            if ($this->kampanye_id) {
                $kampanye = Kampanye::find($this->kampanye_id);
                if ($kampanye) {
                    $this->kategori_id = $kampanye->kategori_id;
                }
            }
        }
        
        if ($donasi) {
            $donasiData = Donasi::with('transaksiDonasi')->findOrFail($donasi);
            $this->donasiId = $donasiData->id;
            $this->donatur_id = $donasiData->donatur_id;
            $this->kategori_id = $donasiData->kategori_id;
            $this->jumlah = $donasiData->jumlah;
            $this->tanggal = $donasiData->tanggal;
            
            // Get kampanye_id from transaksi_donasi
            if ($donasiData->transaksiDonasi->count() > 0) {
                $this->kampanye_id = $donasiData->transaksiDonasi->first()->kampanye_id;
            }
            
            $this->isEdit = true;
        }
    }
    
    public function updatedKampanyeId()
    {
        // When kampanye changes, update kategori_id to match
        if ($this->kampanye_id) {
            $kampanye = Kampanye::find($this->kampanye_id);
            if ($kampanye) {
                $this->kategori_id = $kampanye->kategori_id;
            }
        }
    }
    
    public function toggleNewDonatur()
    {
        $this->createNewDonatur = !$this->createNewDonatur;
        if ($this->createNewDonatur) {
            $this->donatur_id = null;
        } else {
            $this->reset(['nama', 'email', 'telepon']);
        }
    }

    public function save()
    {
        if ($this->createNewDonatur) {
            $this->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:donatur,email',
                'telepon' => 'required|string|max:15',
                'kampanye_id' => 'required|exists:kampanye,id',
                'jumlah' => 'required|numeric|min:1000',
                'tanggal' => 'required|date',
            ]);
        } else {
            $this->validate(array_merge($this->rules, [
                'donatur_id' => 'required|exists:donatur,id',
            ]));
        }
        
        // Validate that donation doesn't exceed campaign target
        $kampanye = Kampanye::find($this->kampanye_id);
        $totalDonations = TransaksiDonasi::join('donasi', 'transaksi_donasi.donasi_id', '=', 'donasi.id')
            ->where('transaksi_donasi.kampanye_id', $this->kampanye_id)
            ->where('transaksi_donasi.status', 'success')
            ->sum('donasi.jumlah');
            
        $remainingTarget = $kampanye->target - $totalDonations;
        
        // If editing, add back the current donation amount to the remaining target
        if ($this->isEdit) {
            $currentDonasi = Donasi::find($this->donasiId);
            $remainingTarget += $currentDonasi->jumlah;
        }
        
        if ($this->jumlah > $remainingTarget) {
            session()->flash('error', 'Donasi melebihi target kampanye yang tersisa. Sisa target: ' . number_format($remainingTarget));
            return;
        }

        try {
            DB::beginTransaction();
            
            // Create new donatur if needed
            if ($this->createNewDonatur) {
                $donatur = Donatur::create([
                    'nama' => $this->nama,
                    'email' => $this->email,
                    'telepon' => $this->telepon,
                ]);
                $this->donatur_id = $donatur->id;
            }

            if ($this->isEdit) {
                $donasi = Donasi::find($this->donasiId);
                $donasi->update([
                    'donatur_id' => $this->donatur_id,
                    'kategori_id' => $this->kategori_id,
                    'jumlah' => $this->jumlah,
                    'tanggal' => $this->tanggal,
                ]);
                
                // Update the transaction
                $transaksi = TransaksiDonasi::where('donasi_id', $donasi->id)->first();
                if ($transaksi) {
                    $transaksi->update([
                        'kampanye_id' => $this->kampanye_id,
                    ]);
                } else {
                    // Create new transaction if none exists
                    TransaksiDonasi::create([
                        'donasi_id' => $donasi->id,
                        'kampanye_id' => $this->kampanye_id,
                        'status' => 'success',
                    ]);
                }
                
                session()->flash('message', 'Donasi berhasil diperbarui.');
            } else {
                $donasi = Donasi::create([
                    'donatur_id' => $this->donatur_id,
                    'kategori_id' => $this->kategori_id,
                    'jumlah' => $this->jumlah,
                    'tanggal' => $this->tanggal,
                ]);
                
                // Create transaction
                TransaksiDonasi::create([
                    'donasi_id' => $donasi->id,
                    'kampanye_id' => $this->kampanye_id,
                    'status' => 'success',
                ]);
                
                session()->flash('message', 'Donasi berhasil ditambahkan.');
            }
            
            DB::commit();
            
            $this->reset(['donatur_id', 'kategori_id', 'kampanye_id', 'jumlah', 'nama', 'email', 'telepon']);
            $this->tanggal = date('Y-m-d');
            $this->createNewDonatur = false;
            $this->dispatch('refreshDonasi');
            
            return redirect()->route('donasi.index');
            
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $donaturList = Donatur::orderBy('nama')->get();
        $kampanyeList = Kampanye::orderBy('nama_kampanye')->get();
        $kategoriList = Kategori::orderBy('nama_kategori')->get();
        
        return view('livewire.donasi.form', [
            'donaturList' => $donaturList,
            'kampanyeList' => $kampanyeList,
            'kategoriList' => $kategoriList,
        ]);
    }
}
