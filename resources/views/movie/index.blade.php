@extends('layouts.app')
@section('content')
<div class="container mx-auto pt-16">
    <div class="pb-24">
        <h2 class="uppercase tracking-wider text-purple-500 text-lg font-bold">Popular Movies</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
            @foreach ($popularMovies->take(18) as $popularMovie)
            <div class="mt-8 group">
                <a href="{{ route('movies.show', $popularMovie['id']) }}">
                    <img src="{{ $popularMovie['poster_path'] }}" alt="{{ $popularMovie['title'] }}" class="rounded-lg group-hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-4">
                    <a href="{{ route('movies.show', $popularMovie['id']) }}" class="font-semibold text-lg group-hover:text-purple-500 transition ease-in-out duration-150">{{ $popularMovie['title'] }}</a>
                    <div class="mt-2 flex items-center text-gray-400 text-xs">
                        <span>
                            <svg class="h-4 w-4 text-orange-500 mb-1" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        </span>
                        <span class="ml-1">{{ $popularMovie['vote_average'] }}</span>
                        <span class="mx-2">&middot;</span>
                        <span>{{ $popularMovie['release_date'] }}</span>
                    </div>
                    <div class="mt-1 text-gray-400 text-xs">{{ $popularMovie['genres'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- <div class="pb-24">
        <div class="flex items-center justify-between">
            <h2 class="uppercase tracking-wider text-purple-500 text-lg font-bold">Random Movies</h2>
            <button
                type="button"
                class="flex items-center text-purple-900 bg-purple-500 hover:bg-purple-600 focus:outline-none font-bold rounded-lg px-4 py-2"
                onclick="fetchRandomMovies()"
                id="refresh-button"
            >
                <svg class="h-5 w-5 stroke-current mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                <span>Refresh</span>
            </button>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8" id="js-partials-random-movies-target">
            You can even put the fetch function inside the div you want to manipulate, like this
            <script>
                fetch('/movies/partials/random-movies')
                    .then(response => response.text())
                    .then(html => {
                        document.querySelector('#js-partials-random-movies-target').innerHTML = html
                    });
            </script>
        </div>
    </div> --}}

    <div class="pb-24">
        <h2 class="uppercase tracking-wider text-purple-500 text-lg font-bold">Now Playing</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
            @foreach ($nowPlayingMovies->take(12) as $nowPlayingMovie)
            <div class="mt-8 group">
                <a href="{{ route('movies.show', $nowPlayingMovie['id']) }}">
                    <img src="{{ $nowPlayingMovie['poster_path'] }}" alt="{{ $nowPlayingMovie['title'] }}" class="rounded-lg group-hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-4">
                    <a href="{{ route('movies.show', $nowPlayingMovie['id']) }}" class="font-semibold text-lg group-hover:text-purple-500 transition ease-in-out duration-150">{{ $nowPlayingMovie['title'] }}</a>
                    <div class="mt-2 flex items-center text-gray-400 text-xs">
                        <span>
                            <svg class="h-5 w-5 fill-current text-orange-500 mb-1" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.133 20.82c-1.147.593-2.488-.365-2.269-1.622l.739-4.239-3.13-3.002c-.927-.89-.415-2.441.867-2.624l4.324-.619 1.934-3.856c.573-1.144 2.23-1.144 2.804 0l1.934 3.856 4.324.619c1.282.183 1.794 1.734.866 2.624l-3.129 3.002.739 4.239c.219 1.257-1.122 2.215-2.269 1.622L12 18.819l-3.867 2z"></path></svg>
                        </span>
                        <span class="ml-1">{{ $nowPlayingMovie['vote_average'] }}</span>
                        <span class="mx-2">&middot;</span>
                        <span>{{ $nowPlayingMovie['release_date'] }}</span>
                    </div>
                    <div class="mt-1 text-gray-400 text-xs">{{ $nowPlayingMovie['genres'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- <script>
    function fetchRandomMovies() {
        var refreshButton = document.querySelector('#refresh-button');
        refreshButton.classList.add('opacity-50', 'cursor-not-allowed', 'pointer-events-none');

        fetch('/movies/partials/random-movies')
            .then(response => response.text())
            .then(html => {
                document.querySelector('#js-partials-random-movies-target').innerHTML = html
                refreshButton.classList.remove('opacity-50', 'cursor-not-allowed', 'pointer-events-none');
            });
    }

    fetchRandomMovies();
</script> --}}
@endpush