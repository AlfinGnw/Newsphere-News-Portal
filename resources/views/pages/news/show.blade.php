@extends('layouts.app')

@section('title', $news->title ?? 'Berita')

@section('content')
    @if($news)
        <!-- Detail Berita -->
        <div class="flex flex-col px-4 lg:px-14 mt-10">
            <div class="font-bold text-xl lg:text-2xl mb-6 text-center lg:text-left">
                <p>{{ $news->title }}</p>
            </div>
            
            <!-- Meta Info -->
            <div class="flex flex-wrap items-center gap-4 mb-6 text-sm text-gray-600">
                <span class="bg-primary text-white px-3 py-1 rounded-full text-xs">
                    {{ $news->newsCategory->title ?? 'Uncategorized' }}
                </span>
                <span>Oleh: {{ $news->author->name ?? 'Unknown' }}</span>
                <span>{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }}</span>
            </div>
            
            <div class="flex flex-col lg:flex-row w-full gap-10">
                <!-- Berita Utama -->
                <div class="lg:w-8/12">
                    <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}" class="w-full max-h-96 rounded-xl object-cover mb-6">
                    <div class="prose max-w-none">
                        {!! $news->content !!}
                    </div>
                </div>
                
                <!-- Berita Terbaru -->
                <div class="lg:w-4/12">
                    <div class="sticky top-24 z-40">
                        <p class="font-bold mb-6 text-xl lg:text-2xl">Berita Terbaru Lainnya</p>
                        <!-- Berita Card -->
                        <div class="space-y-4">
                            @forelse ($latestNews as $new)
                                <a href="{{ route('news.show', $new->slug) }}" class="block">
                                    <div class="border border-slate-200 hover:border-primary p-4 rounded-xl transition-all duration-300 hover:shadow-md">
                                        <div class="flex gap-3">
                                            <div class="w-24 h-24 flex-shrink-0">
                                                <img src="{{ asset('storage/' . $new->thumbnail) }}" alt="{{ $new->title }}" class="w-full h-full rounded-lg object-cover">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="bg-primary text-white rounded-full w-fit px-3 py-1 text-xs font-medium mb-2">
                                                    {{ $new->newsCategory->title ?? 'Uncategorized' }}
                                                </div>
                                                <h3 class="font-bold text-sm lg:text-base mb-2 line-clamp-2">{{ $new->title }}</h3>
                                                <p class="text-slate-500 text-xs">
                                                    {{ \Carbon\Carbon::parse($new->created_at)->format('d M Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <p class="text-gray-500 text-sm">Tidak ada berita terbaru</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Author Section -->
        @if($news->author)
            <div class="flex flex-col gap-4 mb-10 p-4 lg:p-10 lg:px-14 w-full lg:w-2/3">
                <p class="font-semibold text-xl lg:text-2xl mb-2">Author</p>
                <a href="{{ route('author.show', $news->author->username ?? $news->author->id) }}">
                    <div class="flex flex-col lg:flex-row gap-4 items-center border border-slate-300 rounded-xl p-6 lg:p-8 hover:border-primary transition">
                        <img src="{{ asset('storage/' . ($news->author->avatar ?? 'default-avatar.jpg')) }}" alt="profile" class="rounded-full w-24 lg:w-28 border-2 border-primary">
                        <div class="text-center lg:text-left">
                            <p class="font-bold text-lg lg:text-xl">{{ $news->author->name }}</p>
                            <p class="text-sm lg:text-base leading-relaxed text-gray-600">
                                {{ \Str::limit($news->author->bio ?? 'Tidak ada bio tersedia', 100) }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endif
    @else
        <div class="flex flex-col items-center justify-center min-h-96 px-4">
            <h1 class="text-2xl font-bold text-gray-600 mb-4">Berita Tidak Ditemukan</h1>
            <p class="text-gray-500 mb-6">Berita yang Anda cari tidak tersedia atau telah dihapus.</p>
            <a href="{{ route('landing') }}" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition">
                Kembali ke Beranda
            </a>
        </div>
    @endif
@endsection 