<section class="space-y-6">
    <header>
        <h2 class="text-sm font-black text-red-500 uppercase tracking-[0.2em]">
            {{ __('Hapus Akses') }}
        </h2>

        <p class="mt-2 text-xs text-slate-500 leading-relaxed">
            {{ __('Setelah akun dihapus, semua sumber daya dan data akan dimusnahkan secara permanen dari server kami.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="inline-flex items-center justify-center px-6 py-3 bg-red-600/10 border border-red-600/20 hover:bg-red-600 hover:text-white text-red-500 text-[10px] font-black tracking-widest uppercase rounded-xl transition-all active:scale-95"
    >
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
        {{ __('Hapus Akun Saya') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-slate-950 border border-white/5 rounded-[2rem]">
            @csrf
            @method('delete')

            <div class="flex items-center gap-4 mb-6 text-red-500">
                <div class="w-12 h-12 bg-red-500/10 rounded-2xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-white tracking-tight">
                        {{ __('Konfirmasi Penghapusan') }}
                    </h2>
                    <p class="text-xs text-slate-500 uppercase tracking-widest font-bold">Tindakan ini tidak dapat dibatalkan</p>
                </div>
            </div>

            <p class="text-sm text-slate-400 leading-relaxed mb-8">
                {{ __('Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda benar-benar ingin menghapus akun secara permanen.') }}
            </p>

            <div class="space-y-2">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-600 focus:outline-none focus:border-red-500/50 transition-all"
                    placeholder="{{ __('Masukkan Kata Sandi Anda') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-[10px] font-bold uppercase" />
            </div>

            <div class="mt-10 flex flex-col sm:flex-row gap-3 justify-end">
                <button 
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="px-6 py-3 text-[10px] font-black tracking-widest text-slate-400 hover:text-white uppercase transition-colors"
                >
                    {{ __('Batalkan') }}
                </button>

                <button 
                    type="submit"
                    class="px-8 py-3 bg-red-600 hover:bg-red-500 text-white text-[10px] font-black tracking-[0.2em] rounded-xl shadow-lg shadow-red-600/20 transition-all active:scale-95 uppercase"
                >
                    {{ __('Ya, Hapus Akun') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>