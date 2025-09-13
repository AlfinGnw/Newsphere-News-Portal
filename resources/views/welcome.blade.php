<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Newsphere - Portal Berita Terpercaya</title>
        
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.ico') }}">
        <meta name="msapplication-TileColor" content="#f97316">
        <meta name="theme-color" content="#f97316">
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <style>
            body { font-family: 'Instrument Sans', sans-serif; }
            .bg-primary { background-color: #f97316; }
            .text-primary { color: #f97316; }
        </style>
    </head>
    <body class="bg-[#FDFDFC] text-[#1b1b18] flex items-center justify-center min-h-screen">
        <div class="text-center">
            <div class="flex items-center justify-center gap-2 mb-6">
                <img src="{{ asset('assets/img/logo2.jpg') }}" alt="Logo" class="w-12 h-12 rounded-lg">
                <h1 class="text-3xl font-bold text-[#1b1b18]">Newsphere</h1>
            </div>
            <p class="text-lg text-gray-600 mb-8">Portal Berita Terpercaya</p>
            <a href="{{ route('landing') }}" class="inline-block bg-primary text-white px-8 py-3 rounded-full font-semibold hover:bg-primary/90 transition">
                Masuk ke Portal Berita
            </a>
        </div>
    </body>
</html>
