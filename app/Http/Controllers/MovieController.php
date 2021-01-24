<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\ViewModels\MovieViewModel;
use App\ViewModels\MoviesViewModel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MovieController extends Controller
{
    public function index()
    {
        return view('movie.index', [
            'popularMoviesPartialCache' => Cache::get('partial.popular-movies'),
            'nowPlayingMoviesPartialCache' => Cache::get('partial.now-playing-movies')
        ]);
    }

    public function show($id)
    {
        // Get a movie by id
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=videos,images')
            ->json();

        $viewModel = new MovieViewModel($movie);

        return view('movie.show', $viewModel);
    }

    public function partialPopularMovies()
    {
        return Cache::remember('partial.popular-movies', Carbon::parse('10 minutes'), function () {
            // Get popular movies
            $popularMovies = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/movie/popular')
                ->json()['results'];

            // Get all genre
            $genres = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/genre/movie/list')
                ->json()['genres'];

            $viewModel = new MoviesViewModel(
                $popularMovies,
                null,
                $genres,
            );

            return view('partials._popular-movies', $viewModel)->render();
        });
    }

    public function partialNowPlayingMovies()
    {
        return Cache::remember('partial.now-playing-movies', Carbon::parse('10 minutes'), function () {
            // Get now playing movies
            $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/movie/now_playing')
                ->json()['results'];

            // Get all genre
            $genres = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/genre/movie/list')
                ->json()['genres'];

            $viewModel = new MoviesViewModel(
                null,
                $nowPlayingMovies,
                $genres,
            );

            return view('partials._now-playing-movies', $viewModel)->render();
        });
    }
}
