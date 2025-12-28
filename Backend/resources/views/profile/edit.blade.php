@extends('layouts.app')

@section('content')
<div class="min-h-screen pt-28 pb-20 px-6 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-blue-600/5 rounded-full blur-[100px] -z-10"></div>
    
    <div class="max-w-5xl mx-auto">
        <div id="profile-header" class="mb-12">
            <h2 class="text-[10px] font-black text-blue-500 uppercase tracking-[0.4em] mb-2">Account Settings</h2>
            <h1 class="text-4xl font-black text-white tracking-tighter">Pengaturan Profil</h1>
            <p class="text-slate-500 text-sm mt-2">Kelola informasi akun, keamanan, dan privasi Anda.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <div class="lg:col-span-8 space-y-8">
                <div class="profile-card bg-slate-900/40 backdrop-blur-xl border border-white/5 p-8 rounded-[2.5rem] shadow-2xl shadow-black/20">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-10 h-10 bg-blue-600/20 rounded-xl flex items-center justify-center text-blue-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <h3 class="text-lg font-bold text-white">Informasi Pribadi</h3>
                    </div>
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="profile-card bg-slate-900/40 backdrop-blur-xl border border-white/5 p-8 rounded-[2.5rem] shadow-2xl shadow-black/20">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-10 h-10 bg-purple-600/20 rounded-xl flex items-center justify-center text-purple-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <h3 class="text-lg font-bold text-white">Keamanan Akun</h3>
                    </div>
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-8">
                <div class="profile-card bg-gradient-to-br from-blue-600/10 to-transparent border border-blue-500/10 p-8 rounded-[2.5rem]">
                    <h4 class="text-[10px] font-black text-blue-400 uppercase tracking-widest mb-4">Status Akun</h4>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-green-500 animate-ping"></div>
                        <span class="text-sm font-bold text-white">Terverifikasi</span>
                    </div>
                    <p class="text-xs text-slate-500 mt-4 leading-relaxed">Terdaftar sejak: <br> <span class="text-slate-300">{{ auth()->user()->created_at->format('d M Y') }}</span></p>
                </div>

                <div class="profile-card bg-red-500/5 border border-red-500/10 p-8 rounded-[2.5rem]">
                    <div class="flex items-center gap-4 mb-6 text-red-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        <h3 class="text-sm font-bold uppercase tracking-widest">Zona Bahaya</h3>
                    </div>
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tl = gsap.timeline({ defaults: { ease: "expo.out", duration: 1.2 } });

        tl.from("#profile-header", { y: 30, opacity: 0 })
          .from(".profile-card", { 
            y: 40, 
            opacity: 0, 
            stagger: 0.15,
            duration: 1.5 
          }, "-=0.8");
    });
</script>
@endpush