<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
    @foreach (range(1, $cardCount ?? 1) as $item)
    <div class="mt-8 group animate-pulse">
        <div class="bg-dark-800 rounded-lg group-hover:opacity-75 transition ease-in-out duration-150 h-80 w-auto">
        </div>
        <div class="mt-4">
            <a href="#" class="font-semibold text-lg group-hover:text-purple-500 transition ease-in-out duration-150">
                <p class="bg-dark-800 text-transparent rounded-lg inline">
                    {{ str_repeat('_', rand(8, 25)) }}
                </p>
            </a>
            <div class="mt-2 flex items-center text-gray-400 text-xs">
                <span class="bg-dark-800 text-transparent rounded-lg">{{ str_repeat('_', rand(3, 6)) }}</span>
                <span class="mx-2 text-dark-800">&middot;</span>
                <span class="bg-dark-800 text-transparent rounded-lg">{{ str_repeat('_', rand(10, 12)) }}</span>
            </div>
            <div class="mt-1 text-xs bg-dark-800 text-transparent rounded-lg inline">
                {{ str_repeat('_', rand(10, 30)) }}
            </div>
        </div>
    </div>
    @endforeach
</div>