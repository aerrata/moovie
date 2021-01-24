<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
  @foreach ($nowPlayingMovies->take(12) as $nowPlayingMovie)
  <div class="mt-8 group">
    <a href="{{ route('movies.show', $nowPlayingMovie['id']) }}">
      <img src="{{ $nowPlayingMovie['poster_path'] }}" alt="{{ $nowPlayingMovie['title'] }}"
        class="rounded-lg group-hover:opacity-75 transition ease-in-out duration-150 h-80 w-auto object-cover" />
    </a>
    <div class="mt-4">
      <a href="{{ route('movies.show', $nowPlayingMovie['id']) }}"
        class="font-semibold text-lg group-hover:text-purple-500 transition ease-in-out duration-150">
        <p style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden">
          {{ $nowPlayingMovie['title'] }}
        </p>
      </a>
      <div class="mt-2 flex items-center text-gray-400 text-xs">
        <span>
          <svg class="h-5 w-5 fill-current text-yellow-500 mb-1" viewBox="0 0 24 24">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M8.133 20.82c-1.147.593-2.488-.365-2.269-1.622l.739-4.239-3.13-3.002c-.927-.89-.415-2.441.867-2.624l4.324-.619 1.934-3.856c.573-1.144 2.23-1.144 2.804 0l1.934 3.856 4.324.619c1.282.183 1.794 1.734.866 2.624l-3.129 3.002.739 4.239c.219 1.257-1.122 2.215-2.269 1.622L12 18.819l-3.867 2z">
            </path>
          </svg>
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