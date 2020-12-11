@extends('layouts.app')
@section('content')
<div class="container flex mx-auto pt-16 px-10 flex-col md:flex-row">
    <img src="{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="w-94 h-auto md:mr-24 rounded-lg">
    <div class="mt-6 md:mt-0">
        <h2 class="text-4xl font-bold">{{ $movie['title'] }}</h2>
        <div class="mt-4 flex flex-wrap items-center text-gray-400 text-sm">
            <span class="flex mr-2 mb-3">
                <svg class="h-4 w-4 text-yellow-500" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            </span>
            <span class="mb-2">{{ $movie['vote_average'] }}</span>
            <span class="mx-2 mb-2">&middot;</span>
            <span class="mb-2">{{ $movie['release_date'] }}</span>
            <span class="mx-2 mb-2">&middot;</span>
            <span class="mb-2">{{ $movie['genres'] }}</span>
        </div>
        <p class="mt-8">
            {{ $movie['overview'] }}
        </p>

        <div x-data="{ open: false }" @keydown.escape.window="open = false">
            @if (count($movie['videos']) > 0)
            <div class="mt-12 flex items-center">
                <button
                    type="button"
                    class="px-6 py-3 flex items-center uppercase tracking-wider font-bold bg-purple-400 text-purple-900 rounded-lg hover:bg-purple-500 hover:text-purple-900 focus:outline-none transition ease-in-out duration-150"
                    @click="open = true"
                    @click.away="open = false"
                >
                    <span class="mr-2">
                        <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon></svg>
                    </span>
                    <span>Play trailer</span>
                </button>
            </div>
            @endif

            {{-- Youtube modal --}}
            <div x-show.transition.opacity="open" style="background-color: rgba(0, 0, 0, .5);" class="fixed inset-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                <div class="container mx-auto px-10 lg:px-32">
                    <div class="bg-dark-800 rounded-lg relative">
                        <button @click="open = false" class="absolute right-0 top-0 p-4 z-50 bg-dark-800 rounded-full focus:outline-none">
                            <svg class="h-6 w-6 text-purple-500 hover:text-purple-600 focus:outline-none transition ease-in-out duration-150" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                        <div class="p-6">
                            <div class="relative h-0" style="padding-bottom: 56.25%">
                                <iframe class="absolute inset-0 w-full h-full rounded-lg overflow-hidden" width="560" height="315" src="{{ 'https://www.youtube.com/embed/' . $movie['videos'][0]['key'] }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container px-10 mx-auto pt-20 pb-24" x-data="{ open: false, image: '' }" @keydown.escape.window="open = false">
    <h2 class="uppercase tracking-wider text-2xl font-semibold">Images</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
        @forelse ($movie['images'] as $image)
        @if ($loop->index < 9)
        <div class="mt-8">
            <a href="#" @click.prevent="open = true, image = '{{ 'https://image.tmdb.org/t/p/original/' . $image['file_path'] }}'">
                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}" alt="{{ $movie['title'] }}" class="rounded-lg hover:opacity-75 transition ease-in-out duration-150">
            </a>
        </div>
        @endif
        @endforeach
    </div>

    {{-- Image modal --}}
    <div x-show.transition.opacity="open" style="background-color: rgba(0, 0, 0, .5);" class="fixed inset-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
        <div class="container mx-auto px-10 lg:px-32">
            <div class="bg-dark-800 rounded-lg relative">
                <button @click="open = false" @click.away="open = false" class="absolute right-0 top-0 p-4 z-50 bg-dark-800 rounded-full focus:outline-none">
                    <svg class="h-6 w-6 text-purple-500 hover:text-purple-600 focus:outline-none transition ease-in-out duration-150" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
                <div class="p-6">
                    <img :src="image" alt="Image">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection