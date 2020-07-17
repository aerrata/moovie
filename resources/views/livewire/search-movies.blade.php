<div>
    <div class="relative mr-4" x-data="searchInput()" @click.away="open = false">
        <input
            class="rounded-lg bg-dark-500 placeholder-gray-500 text-gray-500 py-2 pl-12 block w-full focus:outline-none focus:bg-white focus:text-gray-800 transition ease-in-out duration-150"
            type="text"
            placeholder="Search.. (Press &quot;/&quot; to focus)"
            wire:model.debounce.100ms="search"
            @focus="open = true"
            @keydown="open = true"
            @keydown.escape.window="open = false"
            @keydown.shift.tab="open = false"
            x-ref="search"
            @keydown.window="inputFocusKeybind()"
        >
        <div class="pointer-events-none absolute inset-y-0 left-0 pl-4 flex items-center">
            <svg class="pointer-events-none text-gray-500 w-5 h-5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        </div>
        {{-- <div class="pointer-events-none absolute inset-y-0 right-0 pr-4 pt-2 flex items-center text-gray-500 font-normal text-sm" wire:loading>Loadin..</div> --}}

        @if (strlen($search) >= 2)
        <div class="absolute z-50 bg-dark-800 rounded-lg mt-4 w-full overflow-hidden" x-show.transition.opacity="open">
            @if(!$results->isEmpty())
            <span class="block px-4 py-3 text-xs">Result for "{{ $search }}"</span>
            @endif
            <ul>
                @forelse ($results as $result)
                <li class="border-b border-dark-700 mb-4 text-sm">
                    <a href="{{ route('movies.show', $result['id']) }}" class="flex items-center hover:bg-dark-700 px-4 py-2" @if ($loop->last) @keydown.tab.exact="open = false" @endif>
                        @if ($result['poster_path'])
                        <img src="{{ 'https://image.tmdb.org/t/p/w92' . $result['poster_path'] }}" alt="{{ $result['title'] }}" class="w-10 rounded mr-4">
                        @else
                        <img src="https://via.placeholder.com/50x75" alt="Placeholder" class="w-10 rounded mr-4">
                        @endif
                        <span>{{ $result['title'] }}</span>
                    </a>
                </li>
                @empty
                <span class="block px-4 py-3 text-xs">No result for "{{ $search }}"</span>
                @endforelse
            </ul>
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    function searchInput () {
        return {
            open: false,
            inputFocusKeybind () {
                if (event.keyCode === 191) {
                    event.preventDefault();
                    this.$refs.search.focus();
                }
            }
        }
    }
</script>
@endpush