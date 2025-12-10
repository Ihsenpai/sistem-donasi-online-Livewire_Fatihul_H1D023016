<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Progress Kampanye: {{ $kampanye->nama_kampanye }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Kategori: {{ $kampanye->kategori->nama_kategori }}
                            </p>
                        </header>

                        <div class="mt-6">
                            <div class="mb-8 bg-white p-4 rounded-lg shadow">
                                <div class="flex justify-between mb-2">
                                    <div class="text-gray-700">Target: <span class="font-semibold">Rp {{ number_format($kampanye->target, 0, ',', '.') }}</span></div>
                                    <div class="text-gray-700">Terkumpul: <span class="font-semibold">Rp {{ number_format($totalDonasi, 0, ',', '.') }}</span></div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-4">
                                    <div class="bg-green-600 h-4 rounded-full" x-bind:style="'width: {{ $progressPercentage }}%'"></div>
                                </div>
                                <div class="text-right mt-1 text-sm text-gray-500">{{ $progressPercentage }}% dari target</div>
                            </div>
                            
                            <div class="my-6">
                                <h3 class="text-md font-medium text-gray-900 mb-4">Donasi Terbaru</h3>
                                
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Donatur</th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @forelse ($recentDonations as $transaksi)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            {{ $transaksi->donasi->is_anonymous ? 'Anonim' : $transaksi->donasi->donatur->nama }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            Rp {{ number_format($transaksi->donasi->jumlah, 0, ',', '.') }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            {{ \Carbon\Carbon::parse($transaksi->donasi->tanggal)->format('d M Y') }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                                            Belum ada donasi untuk kampanye ini
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6">
                                <a href="{{ route('kampanye.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Kembali ke Daftar Kampanye
                                </a>
                                <a href="{{ route('donasi.create', ['kampanye_id' => $kampanye->id]) }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-3">
                                    Donasi Sekarang
                                </a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
