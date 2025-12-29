<section class="mt-32">
    @foreach($categories as $category)
        <div class="mb-24 reveal-up">

            {{-- Header Category --}}
            <div class="flex items-end justify-between mb-10 border-b border-white/5 pb-6">
                <h2 class="text-2xl font-black text-white uppercase italic tracking-tighter">
                    {{ $category['name'] }}
                </h2>

                <a href="{{ route('category.show', $category['slug']) }}"
                   class="text-blue-500 text-[10px] font-black uppercase tracking-widest hover:text-white transition-colors">
                    View All Genre
                </a>
            </div>

            {{-- Book Grid --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-12">
                @foreach($category['books'] as $book)
                    <div class="group cursor-pointer">

                        <div class="relative aspect-[3/4] overflow-hidden rounded-[2rem] bg-slate-900 border border-white/5">
                            <img
                                src="{{ $book['image'] }}"
                                alt="{{ $book['title'] }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100"
                            >

                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent opacity-0 group-hover:opacity-100 transition-opacity p-6 flex items-end">
                                @if(!empty($book['slug']))
                                    <a href="{{ route('book.show', $book['slug']) }}"
                                    class="w-full py-3 bg-white text-black font-black text-[10px] uppercase rounded-xl text-center">
                                        Detail
                                    </a>
                                @else
                                    <span class="w-full py-3 bg-gray-500 text-black font-black text-[10px] uppercase rounded-xl text-center cursor-not-allowed">
                                        No Detail
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="mt-4">
                            <h3 class="text-white font-bold text-sm line-clamp-1">
                                {{ $book['title'] }}
                            </h3>

                            <p class="text-slate-500 text-[10px] font-bold uppercase mt-1">
                                {{ $book['author'] }}
                            </p>

                            <p class="text-blue-500 font-bold text-xs mt-3">
                                {{ $book['price'] }}
                            </p>
                        </div>

                    </div>
                @endforeach
            </div>

            {{-- Pagination Visual (Landing Page – Dummy by Design) --}}
            <div class="mt-12 flex justify-center gap-2">
                <button class="w-8 h-8 rounded-lg bg-white/10 text-white flex items-center justify-center font-bold text-[10px]">
                    1
                </button>

                @if($category['pagination']['hasNext'])
                    <button class="w-8 h-8 rounded-lg bg-white/5 text-slate-500 flex items-center justify-center hover:bg-slate-800 transition-all font-bold text-[10px]">
                        2
                    </button>

                    <a href="{{ route('category.show', $category['slug']) }}"
                       class="w-12 h-8 rounded-lg bg-white/5 text-slate-400 flex items-center justify-center hover:bg-slate-800 transition-all font-bold text-[10px]">
                        Next
                    </a>
                @endif
            </div>

        </div>
    @endforeach
</section>
