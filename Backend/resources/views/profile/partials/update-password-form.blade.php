<section class="relative">
    <header class="mb-8">
        <h2 class="text-sm font-black text-purple-400 uppercase tracking-[0.2em]">
            {{ __('Keamanan Autentikasi') }}
        </h2>

        <p class="mt-2 text-xs text-slate-500 leading-relaxed">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk tetap aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        <div class="group">
            <label for="update_password_current_password" class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1 group-focus-within:text-purple-400 transition-colors">
                {{ __('Kata Sandi Saat Ini') }}
            </label>
            <div class="relative">
                <input id="update_password_current_password" name="current_password" type="password" 
                    class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-600 focus:outline-none focus:border-purple-500/50 focus:ring-1 focus:ring-purple-500/20 transition-all"
                    autocomplete="current-password" placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-[10px] font-bold uppercase tracking-tight" />
        </div>

        <div class="group">
            <label for="update_password_password" class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1 group-focus-within:text-purple-400 transition-colors">
                {{ __('Kata Sandi Baru') }}
            </label>
            <input id="update_password_password" name="password" type="password" 
                class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-600 focus:outline-none focus:border-purple-500/50 focus:ring-1 focus:ring-purple-500/20 transition-all"
                autocomplete="new-password" placeholder="Minimal 8 karakter">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-[10px] font-bold uppercase tracking-tight" />
        </div>

        <div class="group">
            <label for="update_password_password_confirmation" class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1 group-focus-within:text-purple-400 transition-colors">
                {{ __('Konfirmasi Kata Sandi') }}
            </label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-600 focus:outline-none focus:border-purple-500/50 focus:ring-1 focus:ring-purple-500/20 transition-all"
                autocomplete="new-password" placeholder="Ulangi kata sandi baru">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-[10px] font-bold uppercase tracking-tight" />
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="px-8 py-3 bg-purple-600 hover:bg-purple-500 text-white text-[10px] font-black tracking-[0.2em] rounded-xl shadow-lg shadow-purple-600/20 transition-all active:scale-95 uppercase">
                {{ __('Perbarui Sandi') }}
            </button>

            @if (session('status') === 'password-updated')
                <div 
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-4"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center gap-2 text-green-400"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-[10px] font-bold uppercase tracking-widest">{{ __('Berhasil Disimpan') }}</span>
                </div>
            @endif
        </div>
    </form>
</section>