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
        // Get popular movies
        $popularMovies = Cache::remember('popular-movies', Carbon::parse('10 minutes'), function () {
            return Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/movie/popular')
                        ->json()['results'];
        });

        // Get now playing movies
        $nowPlayingMovies = Cache::remember('now-playing-movies', Carbon::parse('10 minutes'), function () {
            return Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/movie/now_playing')
                        ->json()['results'];
        });

        // Get all genre
        $genres = Cache::remember('genres', Carbon::parse('10 minutes'), function () {
            return Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/genre/movie/list')
                        ->json()['genres'];
        });

        $viewModel = new MoviesViewModel(
            $popularMovies,
            $nowPlayingMovies,
            $genres,
        );

        return view('movie.index', $viewModel);
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
}
