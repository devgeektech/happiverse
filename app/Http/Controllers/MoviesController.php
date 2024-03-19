<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\MovieViewModel;
use App\ViewModels\MoviesViewModel;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{

    public function index()
    {
        $popularMovies = Http::asJson()
            ->get(config('services.tmdb.endpoint') . 'movie/popular?api_key=' . config('services.tmdb.token'))['results'];

        $nowPlayingMovies = Http::asJson()
            ->get(config('services.tmdb.endpoint') . 'movie/now_playing?api_key=' . config('services.tmdb.token'))['results'];

        $genres = Http::asJson()
            ->get(config('services.tmdb.endpoint') . 'genre/movie/list?api_key=' . config('services.tmdb.token'))['genres'];

        $viewModel = new MoviesViewModel(
            $popularMovies,
            $nowPlayingMovies,
            $genres,
        );

        return view('web.movies.index', $viewModel);
    }


    public function show($id)
    {
        $movie = Http::asJson()
            ->get(config('services.tmdb.endpoint') . 'movie/' . $id . '?api_key=' . config('services.tmdb.token') . '&append_to_response=videos,images,credits');

        $viewModel = new MovieViewModel($movie);

        return view('web.movies.show', $viewModel);
    }
}
