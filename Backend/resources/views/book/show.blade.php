@extends('layouts.app')

@section('content')
<div class="bg-[#020617] min-h-screen pt-28 pb-16">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-14">

        {{-- LEFT: COVER --}}
        <div class="flex justify-center">
            <img
                src="{{ asset('storage/' . $book->cover) }}"
                alt="{{ $book->title }}"
                class="w-72 rounded-2xl shadow-xl"
            >
        </div>

        {{-- RIGHT: DETAILS --}}
        <div class="text-white space-y-6">

            {{-- CATEGORY --}}
            <span class="text-[11px] uppercase tracking-widest text-blue-400 font-bold">
                {{ $book->category->name }}
            </span>

            {{-- TITLE --}}
            <h1 class="text-3xl font-black leading-tight">
                {{ $book->title }}
            </h1>

            {{-- AUTHOR --}}
            <p class="text-sm text-slate-400">
                oleh <span class="text-white font-semibold">{{ $book->author }}</span>
            </p>

            {{-- PRICE --}}
            <div class="space-y-1">

                {{-- Harga setelah diskon --}}
                <div class="flex items-center gap-3">
                    <span class="text-2xl font-black text-emerald-400">
                        Rp {{ number_format($book->final_price, 0, ',', '.') }}
                    </span>

                    @if($book->is_on_sale && $book->discount_percentage > 0)
                        <span class="text-xs font-bold text-rose-400">
                            -{{ $book->discount_percentage }}%
                        </span>
                    @endif
                </div>

                {{-- Harga awal --}}
                @if($book->is_on_sale && $book->discount_percentage > 0)
                    <span class="text-sm line-through text-slate-500">
                        Rp {{ number_format($book->price, 0, ',', '.') }}
                    </span>
                @endif

            </div>


            {{-- STOCK --}}
            <div class="text-xs text-slate-400">
                Stok tersedia:
                <span class="font-bold text-white">
                    {{ $book->stock }} buku
                </span>
            </div>

            {{-- ACTION BUTTONS (NO LOGIC) --}}
            <div class="flex gap-3 pt-4">

                {{-- Bookmark --}}
                <button
                    class="px-5 py-3 rounded-xl bg-white/5 border border-white/10 hover:border-white/30 transition text-xs font-bold uppercase tracking-wider"
                >
                    Bookmark
                </button>

                {{-- Cart --}}
                <button
                    class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-500 transition text-xs font-bold uppercase tracking-wider"
                >
                    Add to Cart
                </button>

            </div>

            {{-- DESCRIPTION --}}
            <div class="pt-8 border-t border-white/10">
                <h3 class="text-sm font-bold uppercase tracking-widest mb-3 text-slate-300">
                    Deskripsi Buku
                </h3>

                <p class="text-sm leading-relaxed text-slate-400">
                    {{ $book->description ?? 'Belum ada deskripsi untuk buku ini.' }}
                </p>
            </div>

        </div>
    </div>
</div>
@endsection
