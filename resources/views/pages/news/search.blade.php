@extends('layouts.app')
@section('title', 'Hasil Pencarian')

@section('content')
    <!-- Header -->
    <div class="w-full mb-16 bg-[#F6F6F6]">
      <h1 class="text-center font-bold text-2xl p-24">
        @if($query)
          Hasil Pencarian untuk "{{ $query }}"
        @else
          Pencarian Berita
        @endif
      </h1>
    </div>

    <!-- Search Form -->
    <div class="px-4 lg:px-14 mb-8">
      <form action="{{ route('news.search') }}" method="GET" class="max-w-2xl mx-auto">
        <div class="relative">
          <input type="text" name="q" value="{{ $query }}" placeholder="Cari berita..."
            class="border border-slate-300 rounded-full px-4 py-3 pl-12 w-full text-sm font-normal focus:outline-none focus:ring-primary focus:border-primary" />
          <span class="absolute inset-y-0 left-4 flex items-center text-slate-400">
            <img src="{{ asset('assets/img/search.png') }}" alt="search" class="w-4">
          </span>
          <button type="submit" class="absolute inset-y-0 right-0 bg-primary text-white px-6 rounded-r-full font-semibold">
            Cari
          </button>
        </div>
      </form>
    </div>

    <!-- Results -->
    <div class="px-4 lg:px-14">
      @if($query && $news->count() > 0)
        <div class="grid sm:grid-cols-1 gap-5 lg:grid-cols-4">
          @foreach ($news as $newsItem)
            <a href="{{ route('news.show', $newsItem->slug) }}">
              <div class="border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer transition duration-300 ease-in-out" style="height: 100%;">
                <div class="bg-primary text-white rounded-full w-fit px-5 py-1 font-normal ml-2 mt-2 text-sm absolute">
                  {{ $newsItem->newsCategory->title }}
                </div>
                <img src="{{ asset('storage/' . $newsItem->thumbnail) }}" alt="" class="w-full rounded-xl mb-3" style="height: 200px; object-fit: cover;">
                <p class="font-bold text-base mb-1">{{ $newsItem->title }}</p>
                <p class="text-slate-400 text-sm mb-2">Oleh: {{ $newsItem->author->name }}</p>
                <p class="text-slate-400">{{ \Carbon\Carbon::parse($newsItem->created_at)->format('d F Y') }}</p>
              </div>
            </a>
          @endforeach
        </div>
      @elseif($query && $news->count() == 0)
        <div class="text-center py-12">
          <p class="text-slate-500 text-lg">Tidak ada berita yang ditemukan untuk "{{ $query }}"</p>
          <p class="text-slate-400 mt-2">Coba gunakan kata kunci yang berbeda</p>
        </div>
      @else
        <div class="text-center py-12">
          <p class="text-slate-500 text-lg">Masukkan kata kunci untuk mencari berita</p>
        </div>
      @endif
    </div>
@endsection
