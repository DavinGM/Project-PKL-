<section>
    <header class="mb-8">
        <h2 class="text-sm font-black text-blue-400 uppercase tracking-[0.2em]">
            {{ __('Detail Identitas') }}
        </h2>

        <p class="mt-2 text-xs text-slate-500 leading-relaxed">
            {{ __("Perbarui informasi profil akun dan alamat email Anda untuk memastikan data tetap valid.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div class="group">
            <label for="name" class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1 group-focus-within:text-blue-400 transition-colors">
                {{ __('Nama Lengkap') }}
            </label>
            <input id="name" name="name" type="text" 
                class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-600 focus:outline-none focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/20 transition-all" 
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-[10px] font-bold uppercase tracking-tight" :messages="$errors->get('name')" />
        </div>

        <div class="group">
            <label for="email" class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1 group-focus-within:text-blue-400 transition-colors">
                {{ __('Alamat Email') }}
            </label>
            <input id="email" name="email" type="email" 
                class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-600 focus:outline-none focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/20 transition-all" 
                value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <x-input-error class="mt-2 text-[10px] font-bold uppercase tracking-tight" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 bg-yellow-500/5 border border-yellow-500/10 rounded-xl">
                    <p class="text-xs text-yellow-500/80 font-medium italic">
                        {{ __('Email Anda belum terverifikasi.') }}

                        <button form="send-verification" class="ml-2 underline text-yellow-500 hover:text-yellow-400 font-bold transition-colors">
                            {{ __('Kirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-black text-[9px] text-green-400 uppercase tracking-widest animate-pulse">
                            {{ __('Link verifikasi baru telah dikirim!') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="px-8 py-3 bg-blue-600 hover:bg-blue-500 text-white text-[10px] font-black tracking-[0.2em] rounded-xl shadow-lg shadow-blue-600/20 transition-all active:scale-95 uppercase">
                {{ __('Simpan Perubahan') }}
            </button>

            @if (session('status') === 'profile-updated')
                <div 
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-4"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center gap-2 text-blue-400"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-[10px] font-bold uppercase tracking-widest">{{ __('Profil Diperbarui') }}</span>
                </div>
            @endif
        </div>
    </form>
</section>