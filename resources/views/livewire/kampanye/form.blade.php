<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ $isEdit ? 'Edit Kampanye' : 'Tambah Kampanye Baru' }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ $isEdit ? 'Edit informasi kampanye yang sudah ada' : 'Tambahkan kampanye donasi baru ke sistem' }}
                            </p>
                        </header>

                        <form wire:submit.prevent="save" class="mt-6 space-y-6">
                            <div>
                                <x-input-label for="nama_kampanye" :value="__('Nama Kampanye')" />
                                <x-text-input id="nama_kampanye" wire:model="nama_kampanye" class="mt-1 block w-full" type="text" required autofocus />
                                <x-input-error :messages="$errors->get('nama_kampanye')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="kategori_id" :value="__('Kategori')" />
                                <select id="kategori_id" wire:model="kategori_id" class="mt-1 block w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($kategoriList as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('kategori_id')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="target" :value="__('Target Donasi (Rp)')" />
                                <x-text-input id="target" wire:model="target" class="mt-1 block w-full" type="number" min="1000" step="1000" required />
                                <x-input-error :messages="$errors->get('target')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ $isEdit ? 'Simpan Perubahan' : 'Simpan' }}</x-primary-button>
                                <a href="{{ route('kampanye.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
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
