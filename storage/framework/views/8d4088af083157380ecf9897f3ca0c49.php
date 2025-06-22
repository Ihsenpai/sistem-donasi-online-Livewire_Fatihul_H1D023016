<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-green-800 dark:text-green-400 mb-6">Selamat Datang di DonasiKu!</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <!-- Stats Card 1 -->
                        <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-lg font-semibold text-green-800">Total Donasi</h3>
                                <span class="bg-green-100 text-green-800 text-xs font-medium py-1 px-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                            </div>
                            <p class="text-3xl font-bold text-green-700">Rp<?php echo e(number_format(\App\Models\Donasi::sum('jumlah'), 0, ',', '.')); ?></p>
                            <p class="text-sm text-green-600 mt-2"><?php echo e(\App\Models\Donasi::count()); ?> donasi telah diterima</p>
                        </div>
                        
                        <!-- Stats Card 2 -->
                        <!-- Stats Card 2 -->
                        <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-lg font-semibold text-green-800">Kampanye Aktif</h3>
                                <span class="bg-green-100 text-green-800 text-xs font-medium py-1 px-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                            </div>
                            <p class="text-3xl font-bold text-green-700"><?php echo e(\App\Models\Kampanye::count()); ?></p>
                            <p class="text-sm text-green-600 mt-2"><?php echo e(\App\Models\Kampanye::count() > 0 ? 'Kampanye aktif saat ini' : 'Belum ada kampanye'); ?></p>
                        </div>
                        
                        <!-- Stats Card 3 -->
                        <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-lg font-semibold text-green-800">Kategori</h3>
                                <span class="bg-green-100 text-green-800 text-xs font-medium py-1 px-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                </span>
                            </div>
                            <p class="text-3xl font-bold text-green-700"><?php echo e(\App\Models\Kategori::count()); ?></p>
                            <p class="text-sm text-green-600 mt-2"><?php echo e(\App\Models\Kategori::count() > 0 ? 'Kategori tersedia' : 'Belum ada kategori'); ?></p>
                        </div>
                    </div>
                    
                    <div class="bg-green-700 text-white p-6 rounded-lg mb-8">
                        <h3 class="text-xl font-bold mb-4">Selamat Datang!</h3>
                        <p class="mb-4">Terima kasih telah bergabung dengan DonasiKu. Platform ini memungkinkan Anda untuk membuat dan mengelola kampanye donasi, serta melihat progres dari setiap kampanye.</p>
                        <div class="flex space-x-4 mt-4">
                            <a href="<?php echo e(route('kampanye.create')); ?>" class="bg-white text-green-800 px-4 py-2 rounded-md font-medium hover:bg-green-100">Mulai Kampanye</a>
                            <a href="<?php echo e(route('donasi.create')); ?>" class="bg-green-600 text-white px-4 py-2 rounded-md font-medium hover:bg-green-500">Donasi Sekarang</a>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Recent Campaigns Section -->
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-4">Kampanye Terbaru</h3>
                            <?php if(\App\Models\Kampanye::count() > 0): ?>
                                <div class="space-y-4">
                                    <?php $__currentLoopData = \App\Models\Kampanye::with('kategori')->latest()->take(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kampanye): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="border-b border-gray-200 pb-4">
                                            <div class="flex justify-between">
                                                <div>
                                                    <h4 class="font-semibold text-gray-800"><?php echo e($kampanye->nama_kampanye); ?></h4>
                                                    <p class="text-sm text-gray-600"><?php echo e($kampanye->kategori->nama_kategori); ?></p>
                                                </div>
                                                <div class="text-right">
                                                    <p class="font-semibold text-green-700">Rp <?php echo e(number_format($kampanye->target, 0, ',', '.')); ?></p>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <a href="<?php echo e(route('kampanye.progress', $kampanye->id)); ?>" class="text-green-600 hover:text-green-800 text-sm">Lihat Progres</a>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="mt-4 text-center">
                                    <a href="<?php echo e(route('kampanye.index')); ?>" class="text-green-600 hover:text-green-800 inline-block">Lihat Semua Kampanye</a>
                                </div>
                            <?php else: ?>
                                <div class="text-gray-500 text-center py-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p>Belum ada kampanye yang dibuat</p>
                                    <a href="<?php echo e(route('kampanye.create')); ?>" class="text-green-600 hover:text-green-800 mt-2 inline-block">+ Buat Kampanye Baru</a>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Recent Donations Section -->
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-4">Donasi Terbaru</h3>
                            <?php if(\App\Models\Donasi::count() > 0): ?>
                                <div class="space-y-4">
                                    <?php $__currentLoopData = \App\Models\Donasi::with(['donatur', 'transaksiDonasi.kampanye'])->latest()->take(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="border-b border-gray-200 pb-4">
                                            <div class="flex justify-between">
                                                <div>
                                                    <h4 class="font-semibold text-gray-800"><?php echo e($donasi->donatur->nama); ?></h4>
                                                    <p class="text-sm text-gray-600">
                                                        <?php if($donasi->transaksiDonasi->count() > 0): ?>
                                                            <?php echo e($donasi->transaksiDonasi->first()->kampanye->nama_kampanye); ?>

                                                        <?php else: ?>
                                                            Tidak ada kampanye
                                                        <?php endif; ?>
                                                    </p>
                                                </div>
                                                <div class="text-right">
                                                    <p class="font-semibold text-green-700">Rp <?php echo e(number_format($donasi->jumlah, 0, ',', '.')); ?></p>
                                                    <p class="text-xs text-gray-500"><?php echo e(\Carbon\Carbon::parse($donasi->tanggal)->format('d M Y')); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="mt-4 text-center">
                                    <a href="<?php echo e(route('donasi.index')); ?>" class="text-green-600 hover:text-green-800 inline-block">Lihat Semua Donasi</a>
                                </div>
                            <?php else: ?>
                                <div class="text-gray-500 text-center py-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p>Belum ada donasi yang diterima</p>
                                    <a href="<?php echo e(route('donasi.create')); ?>" class="text-green-600 hover:text-green-800 mt-2 inline-block">+ Buat Donasi Baru</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\sistem-donasi-online - Copy\resources\views/dashboard.blade.php ENDPATH**/ ?>