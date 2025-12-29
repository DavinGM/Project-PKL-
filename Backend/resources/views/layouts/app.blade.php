<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
    

<div id="preloader" class="fixed inset-0 z-[9999] bg-slate-950 flex flex-col items-center justify-center overflow-hidden">
    <div id="loader-logo" class="relative">
        <div class="w-20 h-20 bg-blue-600 rounded-2xl flex items-center justify-center shadow-[0_0_50px_rgba(37,99,235,0.3)]">
            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
        </div>
        <div class="absolute inset-0 w-20 h-20 border-2 border-blue-500 rounded-2xl animate-ping opacity-20"></div>
    </div>

    <div class="mt-10 w-48 h-[2px] bg-white/10 rounded-full overflow-hidden relative">
        <div id="loader-progress" class="absolute top-0 left-0 h-full w-0 bg-blue-500 shadow-[0_0_15px_rgba(59,130,246,0.8)]"></div>
    </div>
    
    <div id="loader-text" class="mt-4 text-slate-500 font-black text-[10px] uppercase tracking-[0.5em] animate-pulse">
        Initializing Experience
    </div>
</div>

<style>
    /* Mencegah scroll saat loading */
    body.loading {
        overflow: hidden;
    }
</style>


    <div class="min-h-screen relative">
        @include('layouts.navigation')

        <main>
            @yield('content')
        </main>
    </div>
    @stack('scripts')
    <script>
    // Tambahkan class loading ke body segera setelah script terbaca
    document.body.classList.add('loading');

    window.addEventListener('load', () => {
        const tl = gsap.timeline({
            onComplete: () => {
                // Hapus elemen preloader dari DOM setelah animasi selesai agar ringan
                document.getElementById('preloader').remove();
                document.body.classList.remove('loading');
            }
        });

        // 1. Animasi Progress Bar (Simulasi cepat menuju 100%)
        tl.to("#loader-progress", {
            width: "100%",
            duration: 0.8,
            ease: "power2.inOut"
        });

        // 2. Logo Zoom & Fade Out
        tl.to("#loader-logo", {
            scale: 1.5,
            opacity: 0,
            duration: 0.5,
            ease: "power4.in"
        }, "+=0.2");

        // 3. Text Fade Out
        tl.to("#loader-text", {
            y: 20,
            opacity: 0,
            duration: 0.3
        }, "-=0.3");

        // 4. Slide Up Background Utama (Efek tirai terbuka)
        tl.to("#preloader", {
            yPercent: -100,
            duration: 1,
            ease: "expo.inOut"
        });

        // 5. Trigger Animasi Hero setelah Preloader Selesai
        // Anda bisa memanggil fungsi animasi Hero Anda di sini jika perlu
    });
</script>
</body>
</html>