<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ $isEdit ? 'Edit Donasi' : 'Tambah Donasi Baru' }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ $isEdit ? 'Edit informasi donasi yang sudah ada' : 'Tambahkan donasi baru ke sistem' }}
                            </p>
                        </header>

                        @if (session()->has('error'))
                            <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        @endif

                        <form wire:submit.prevent="save" class="mt-6 space-y-6">
                            <!-- Pilih donatur atau buat baru -->
                            <div>
                                <div class="flex items-center mb-4">
                                    <button type="button" wire:click="toggleNewDonatur" class="text-sm text-green-600 hover:text-green-900">
                                        {{ $createNewDonatur ? 'Pilih Donatur yang Sudah Ada' : 'Tambah Donatur Baru' }}
                                    </button>
                                </div>

                                @if ($createNewDonatur)
                                    <!-- Form untuk donatur baru -->
                                    <div class="space-y-4 p-4 bg-gray-50 rounded-md">
                                        <h3 class="text-md font-medium text-gray-900">Data Donatur Baru</h3>
                                        
                                        <div>
                                            <x-input-label for="nama" :value="__('Nama Donatur')" />
                                            <x-text-input id="nama" wire:model="nama" class="mt-1 block w-full" type="text" required />
                                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                                        </div>
                                        
                                        <div>
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" wire:model="email" class="mt-1 block w-full" type="email" required />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        
                                        <div>
                                            <x-input-label for="telepon" :value="__('Telepon')" />
                                            <x-text-input id="telepon" wire:model="telepon" class="mt-1 block w-full" type="text" required />
                                            <x-input-error :messages="$errors->get('telepon')" class="mt-2" />
                                        </div>
                                    </div>
                                @else
                                    <!-- Pilih donatur yang sudah ada -->
                                    <div>
                                        <x-input-label for="donatur_id" :value="__('Donatur')" />
                                        <select id="donatur_id" wire:model="donatur_id" class="mt-1 block w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm">
                                            <option value="">Pilih Donatur</option>
                                            @foreach($donaturList as $donatur)
                                                <option value="{{ $donatur->id }}">{{ $donatur->nama }} ({{ $donatur->email }})</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('donatur_id')" class="mt-2" />
                                    </div>
                                @endif
                            </div>

                            <!-- Pilih kampanye -->
                            <div>
                                <x-input-label for="kampanye_id" :value="__('Kampanye')" />
                                <select id="kampanye_id" wire:model="kampanye_id" class="mt-1 block w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm">
                                    <option value="">Pilih Kampanye</option>
                                    @foreach($kampanyeList as $kampanye)
                                        <option value="{{ $kampanye->id }}">{{ $kampanye->nama_kampanye }} (Target: Rp {{ number_format($kampanye->target, 0, ',', '.') }})</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('kampanye_id')" class="mt-2" />
                            </div>

                            <!-- Kategori akan otomatis terpilih berdasarkan kampanye -->
                            <div>
                                <x-input-label for="kategori_id" :value="__('Kategori')" />
                                <select id="kategori_id" wire:model="kategori_id" class="mt-1 block w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm" {{ $kampanye_id ? 'disabled' : '' }}>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($kategoriList as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('kategori_id')" class="mt-2" />
                                <p class="mt-1 text-xs text-gray-500">Kategori akan otomatis terpilih sesuai dengan kampanye</p>
                            </div>

                            <!-- Jumlah donasi -->
                            <div>
                                <x-input-label for="jumlah" :value="__('Jumlah Donasi (Rp)')" />
                                <x-text-input id="jumlah" wire:model="jumlah" class="mt-1 block w-full" type="number" min="1000" step="1000" required />
                                <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
                            </div>

                            <!-- Tanggal donasi -->
                            <div>
                                <x-input-label for="tanggal" :value="__('Tanggal Donasi')" />
                                <x-text-input id="tanggal" wire:model="tanggal" class="mt-1 block w-full" type="date" required />
                                <x-input-error :messages="$errors->get('tanggal')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ $isEdit ? 'Simpan Perubahan' : 'Simpan' }}</x-primary-button>
                                <a href="{{ route('donasi.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                    Batal
                                </a>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
