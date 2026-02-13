<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client; 
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $client = new \GuzzleHttp\Client();
    
        $search = $request->search ?? 'avengers';
        if(empty($search)){
            return redirect('movies')->with('error', 'Search term cannot be empty');
        }
        $page = $request->page ?? 1;
    
        $response = $client->get('http://www.omdbapi.com/', [
            'query' => [
                'apikey' => env('OMDB_KEY'),
                's' => $search,
                'page' => $page
            ]
        ]);
        
        $movies = json_decode($response->getBody());
    
        // Kalau request AJAX → return partial view
        if ($request->ajax()) {
            return view('movies.partials.movie_list', compact('movies'))->render();
        }
    
        return view('movies.index', compact('movies'));
    }

    public function show($id)
    {
        $client = new Client();

        $response = $client->get("http://www.omdbapi.com/", [
            'query' => [
                'apikey' => env('OMDB_KEY'),
                'i' => $id,
                'plot' => 'full'
            ]
        ]);

        $movie = json_decode($response->getBody());

        return view('movies.detail', compact('movie'));
    }

    public function changeLanguage($lang)
    {
        if (in_array($lang, ['en', 'id'])) {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }
        return redirect()->back();
    }
}


