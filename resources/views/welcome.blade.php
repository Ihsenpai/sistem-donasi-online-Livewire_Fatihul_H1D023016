<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'DonasiKu') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Figtree', 'sans-serif'],
                        },
                    }
                }
            }
        </script>
    </head>
    <body class="antialiased font-sans bg-gray-50">
        <div class="min-h-screen flex flex-col">
            <!-- Header -->
            <header class="bg-green-800 text-white shadow-md">
                <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-bold">DonasiKu</h1>
                    </div>
                    
                    @if (Route::has('login'))
                        <livewire:welcome.navigation />
                    @endif
                </div>
            </header>

            <!-- Hero Section -->
            <div class="bg-green-700 text-white py-16">
                <div class="container mx-auto px-4">
                    <div class="max-w-3xl mx-auto text-center">
                        <h1 class="text-4xl md:text-5xl font-bold mb-6">Berbagi Kebaikan Untuk Sesama</h1>
                        <p class="text-xl mb-8">Platform donasi online terpercaya untuk menyalurkan bantuan kepada mereka yang membutuhkan</p>
                        <div class="space-x-4">
                            <a href="{{ route('register') }}" class="bg-white text-green-800 hover:bg-green-100 px-6 py-3 rounded-lg font-semibold inline-block">Daftar Sekarang</a>
                            <a href="#kampanye" class="bg-green-600 hover:bg-green-500 text-white px-6 py-3 rounded-lg font-semibold inline-block">Lihat Kampanye</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="py-16 bg-white" id="fitur">
                <div class="container mx-auto px-4">
                    <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Mengapa Memilih DonasiKu?</h2>
                    
                    <div class="grid md:grid-cols-3 gap-8">
                        <!-- Feature 1 -->
                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100 hover:shadow-lg transition duration-300">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold mb-2 text-gray-800">Transparan</h3>
                            <p class="text-gray-600">Setiap donasi yang masuk dapat dilacak dengan jelas dan transparan.</p>
                        </div>
                        
                        <!-- Feature 2 -->
                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100 hover:shadow-lg transition duration-300">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold mb-2 text-gray-800">Aman & Terpercaya</h3>
                            <p class="text-gray-600">Sistem pembayaran yang aman dan terjamin sampai ke tujuan yang tepat.</p>
                        </div>
                        
                        <!-- Feature 3 -->
                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100 hover:shadow-lg transition duration-300">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold mb-2 text-gray-800">Beragam Kampanye</h3>
                            <p class="text-gray-600">Berbagai pilihan kampanye sesuai dengan keinginan dan minat Anda.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Campaign Section -->
            <div class="py-16 bg-gray-50" id="kampanye">
                <div class="container mx-auto px-4">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Kampanye Terbaru</h2>
                        <p class="text-gray-600 max-w-2xl mx-auto">Mari berpartisipasi dalam kampanye donasi untuk membantu sesama</p>
                    </div>
                    
                    <div class="grid md:grid-cols-3 gap-8">
                        @php
                            $kampanyeTerbaru = \App\Models\Kampanye::with('kategori')->latest()->take(3)->get();
                        @endphp
                        
                        @forelse($kampanyeTerbaru as $kampanye)
                            @php
                                $totalDonasi = \App\Models\TransaksiDonasi::join('donasi', 'transaksi_donasi.donasi_id', '=', 'donasi.id')
                                    ->where('transaksi_donasi.kampanye_id', $kampanye->id)
                                    ->where('transaksi_donasi.status', 'success')
                                    ->sum('donasi.jumlah');
                                
                                $progressPercentage = ($kampanye->target > 0) ? min(100, round(($totalDonasi / $kampanye->target) * 100)) : 0;
                            @endphp
                            
                            <!-- Campaign Card -->
                            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                                <div class="h-48 bg-green-200 flex items-center justify-center">
                                    <div class="text-green-800 font-bold text-xl">{{ $kampanye->kategori->nama_kategori }}</div>
                                </div>
                                <div class="p-6">
                                    <h3 class="font-bold text-xl mb-2 text-gray-800">{{ $kampanye->nama_kampanye }}</h3>
                                    <p class="text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit($kampanye->nama_kampanye, 100) }}</p>
                                    
                                    <div class="mb-4">
                                        <div class="flex justify-between text-sm mb-1">
                                            <span class="text-gray-600">Terkumpul: Rp{{ number_format($totalDonasi, 0, ',', '.') }}</span>
                                            <span class="text-gray-600">{{ $progressPercentage }}%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-green-600 h-2 rounded-full" @style(["width" => $progressPercentage."%"])></div>
                                        </div>
                                        <div class="text-sm text-gray-500 mt-1">Target: Rp{{ number_format($kampanye->target, 0, ',', '.') }}</div>
                                    </div>
                                    
                                    <a href="{{ route('kampanye.progress', $kampanye->id) }}" class="block text-center bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded">Lihat Kampanye</a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-3 text-center py-8">
                                <p class="text-gray-500">Belum ada kampanye yang tersedia.</p>
                            </div>
                        @endforelse
                    </div>
                    
                    <div class="text-center mt-10">
                        <a href="{{ route('kampanye.index') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-6 rounded-lg">Lihat Semua Kampanye</a>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="bg-green-700 text-white py-16">
                <div class="container mx-auto px-4 text-center">
                    <h2 class="text-3xl font-bold mb-6">Mulai Berdonasi Sekarang</h2>
                    <p class="text-xl mb-8 max-w-2xl mx-auto">Jadilah bagian dari perubahan positif. Setiap donasi yang Anda berikan akan membuat perbedaan besar bagi mereka yang membutuhkan.</p>
                    <a href="{{ route('register') }}" class="bg-white text-green-800 hover:bg-green-100 px-8 py-3 rounded-lg font-semibold inline-block">Daftar & Donasi</a>
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-green-800 text-white py-10">
                <div class="container mx-auto px-4 text-center">
                    <h3 class="text-xl font-bold mb-4">DonasiKu</h3>
                    <p class="text-green-200 max-w-2xl mx-auto">Platform donasi online terpercaya untuk menyalurkan bantuan kepada mereka yang membutuhkan.</p>
                    <p class="mt-4 text-green-200">fatihulihsan70@gmail.com</p>
                </div>
            </footer>
        </div>
    </body>
</html>
                               