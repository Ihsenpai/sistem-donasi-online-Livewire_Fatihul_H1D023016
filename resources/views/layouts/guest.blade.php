<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'DonasiKu') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS via CDN -->
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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-green-50">
            <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="mb-8 text-center">
                    <a href="/" class="text-3xl font-bold text-green-700">
                        DonasiKu
                    </a>
                    <p class="mt-2 text-sm text-green-600">Platform donasi online terpercaya</p>
                </div>
                
                {{ $slot }}
            </div>
            
            <div class="mt-8 text-center text-sm text-green-600">
                <p class="font-bold">DonasiKu</p>
                <p class="mt-1">Platform donasi online terpercaya untuk menyalurkan bantuan kepada mereka yang membutuhkan.</p>
                <p class="mt-3">fatihulihsan70@gmail.com</p>
            </div>
        </div>
    </body>
</html>
