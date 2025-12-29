@extends('layouts.app')

@section('content')
<div id="category-page" class="bg-[#020617] min-h-screen pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-6">
        
        {{-- 1. Hero Section (Branding & Search) --}}
        @include('category._HeroSection')

        {{-- 2. Bento Grid Categories (Navigasi Genre - POSISI PALING ATAS) --}}
        @include('category._CategoryGrid')

        {{-- 3. Book Section (List 8 Buku per Kategori dengan Pagination) --}}
        @include('category._BookSection')
        
    </div>
</div>
@endsection