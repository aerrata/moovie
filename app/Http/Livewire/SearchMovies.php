<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchMovies extends Component
{
    public $search = '';

    protected $updatesQueryString = [
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        $results = [];

        if (strlen($this->search) >= 2) {
            $results = Http::withToken(config('services.tmdb.token'))
                                ->get('https://api.themoviedb.org/3/search/movie?query=' . $this->search)
                                ->json()['results'];

            $results = collect($results)->take(6);
        }

        return view('livewire.search-movies', compact('results'));
    }
}
