<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
  @foreach ($popularMovies->take(18) as $popularMovie)
  <div class="mt-8 group">
    <a href="{{ route('movies.show', $popularMovie['id']) }}">
      <img src="{{ $popularMovie['poster_path'] }}" alt="{{ $popularMovie['title'] }}"
        class="rounded-lg group-hover:opacity-75 transition ease-in-out duration-150" />
    </a>
    <div class="mt-4">
      <a href="{{ route('movies.show', $popularMovie['id']) }}"
        class="font-semibold text-lg group-hover:text-purple-500 transition ease-in-out duration-150">
        <p style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden">
          {{ $popularMovie['title'] }}
        </p>
      </a>
      <div class="mt-2 flex items-center text-gray-400 text-xs">
        <span>
          <svg class="h-4 w-4 text-yellow-500 mb-1" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
            stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polygon
              points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
            </polygon>
          </svg>
        </span>
        <span class="ml-1">{{ $popularMovie['vote_average'] }}</span>
        <span class="mx-2">&middot;</span>
        <span>{{ $popularMovie['release_date'] }}</span>
      </div>
      <div class="mt-1 text-gray-400 text-xs">
        {{ $popularMovie['genres'] }}
      </div>
    </div>
  </div>
  @endforeach
</div>