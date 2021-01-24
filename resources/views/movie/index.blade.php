@extends('layouts.app')
@section('content')
<div class="container mx-auto px-10 pt-16">
    <div class="pb-24">
        <h2 class="uppercase tracking-wider text-purple-500 text-lg font-bold">Popular Movies</h2>
        <div>
            @if ($popularMoviesPartialCache)
            {!! $popularMoviesPartialCache !!}
            @else
            <include-fragment src="{{ route('movies.partialPopularMovies') }}">
                @include('partials._movies-placeholder', ['cardCount' => 18])
            </include-fragment>
            @endif
        </div>
    </div>

    <div class="pb-24">
        <h2 class="uppercase tracking-wider text-purple-500 text-lg font-bold">Now Playing</h2>
        <div>
            @if ($nowPlayingMoviesPartialCache)
            {!! $nowPlayingMoviesPartialCache !!}
            @else
            <include-fragment src="{{ route('movies.partialNowPlayingMovies') }}">
                @include('partials._movies-placeholder', ['cardCount' => 12])
            </include-fragment>
            @endif
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