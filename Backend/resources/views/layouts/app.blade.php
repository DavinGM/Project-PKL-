<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,800&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/lenis@1.1.18/dist/lenis.min.js"></script>
    <script>
        const lenis = new Lenis({
    // DURASI: Semakin besar angkanya, semakin lambat/lama scroll berhenti (Contoh: 2 detik)
    duration: 2.2, 
    
    // EASING: Fungsi matematika untuk kelembutan. 
    // Rumus ini akan membuat scroll berhenti sangat perlahan di akhir.
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), 
    
    // WHEEL MULTIPLIER: Membuat putaran roda mouse jadi lebih sedikit jaraknya
    // Semakin kecil angka ini (misal 0.7), user harus lebih banyak scroll untuk berpindah.
    wheelMultiplier: 0.8, 
    
    // TOUCH MULTIPLIER: Efek yang sama untuk layar sentuh
    touchMultiplier: 1.5,
    
    infinite: false,
    smoothWheel: true,
    smoothTouch: true,
});

function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
}

requestAnimationFrame(raf);
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
        body { background-color: #020617; color: white; font-family: 'Figtree', sans-serif; }
    </style>
</head>
<body class="antialiased selection:bg-blue-500/30">
    <div class="min-h-screen relative">
        @include('layouts.navigation')

        <main>
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>