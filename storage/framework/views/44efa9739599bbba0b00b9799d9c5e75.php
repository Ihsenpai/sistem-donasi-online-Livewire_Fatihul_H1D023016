<nav class="flex flex-1 justify-end">
    <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
        <a
            href="<?php echo e(url('/dashboard')); ?>"
            class="rounded-md px-4 py-2 text-white bg-green-600 transition hover:bg-green-700 focus:outline-none mx-2"
        >
            Dashboard
        </a>
    <?php else: ?>
        <a
            href="<?php echo e(route('login')); ?>"
            class="rounded-md px-4 py-2 text-green-800 bg-white border border-green-600 transition hover:bg-green-50 focus:outline-none mx-2"
        >
            Log in
        </a>

        <!--[if BLOCK]><![endif]--><?php if(Route::has('register')): ?>
            <a
                href="<?php echo e(route('register')); ?>"
                class="rounded-md px-4 py-2 text-white bg-green-600 transition hover:bg-green-700 focus:outline-none mx-2"
            >
                Register
            </a>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</nav><?php /**PATH C:\laragon\www\sistem-donasi-online - Copy\resources\views\livewire/welcome/navigation.blade.php ENDPATH**/ ?>