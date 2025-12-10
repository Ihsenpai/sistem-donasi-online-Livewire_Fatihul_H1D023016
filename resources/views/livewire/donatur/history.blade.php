<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Histori Donasi: {{ $donatur->nama }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Email: {{ $donatur->email }} | Telepon: {{ $donatur->telepon }}
                            </p>
                        </header>

                        <div class="mt-6">
                            <div class="mb-6">
                                <div class="bg-gray-100 p-4 rounded-lg">
                                    <div class="flex justify-between">
                                        <div>
                                            <span class="text-gray-700 font-semibold">Total Donasi:</span>
                                            <span class="text-green-600 font-bold text-lg ml-2">Rp {{ number_format($totalDonation, 0, ',', '.') }}</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-700 font-semibold">Jumlah Donasi:</span>
                                            <span class="text-blue-600 font-bold text-lg ml-2">{{ $donationCount }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kampanye</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @forelse ($donasiList as $index => $donasi)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $index + 1 }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        @if($donasi->transaksiDonasi->count() > 0)
                                                            <a href="{{ route('kampanye.progress', $donasi->transaksiDonasi->first()->kampanye->id) }}" class="text-blue-600 hover:text-blue-900">
                                                                {{ $donasi->transaksiDonasi->first()->kampanye->nama_kampanye }}
                                                            </a>
                                                        @else
                                                            <span class="text-red-500">Tidak ada</span>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $donasi->kategori->nama_kategori }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        Rp {{ number_format($donasi->jumlah, 0, ',', '.') }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ \Carbon\Carbon::parse($donasi->tanggal)->format('d M Y') }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        @if(isset($donasi->transaksiDonasi[0]))
                                                            @if($donasi->transaksiDonasi[0]->status == 'pending')
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                                    Pending
                                                                </span>
                                                            @elseif($donasi->transaksiDonasi[0]->status == 'success')
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                    Success
                                                                </span>
                                                            @else
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                    Failed
                                                                </span>
                                                            @endif
                                                        @else
                                                            <span class="text-red-500">Tidak ada</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                                        Donatur belum pernah melakukan donasi
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="mt-6">
                                <a href="{{ route('donasi.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Kembali ke Daftar Donasi
                                </a>
                                <a href="{{ route('donasi.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-3">
                                    Tambah Donasi Baru
                                </a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
