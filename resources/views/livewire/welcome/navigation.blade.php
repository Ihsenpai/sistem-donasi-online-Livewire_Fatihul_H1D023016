<nav class="flex flex-1 justify-end">
    @auth
        <a
            href="{{ url('/dashboard') }}"
            class="rounded-md px-4 py-2 text-white bg-green-600 transition hover:bg-green-700 focus:outline-none mx-2"
        >
            Dashboard
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class="rounded-md px-4 py-2 text-green-800 bg-white border border-green-600 transition hover:bg-green-50 focus:outline-none mx-2"
        >
            Log in
        </a>

        @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="rounded-md px-4 py-2 text-white bg-green-600 transition hover:bg-green-700 focus:outline-none mx-2"
            >
                Register
            </a>
        @endif
    @endauth
</nav>
