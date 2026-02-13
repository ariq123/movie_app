<?php

namespace App\Http\Controllers;
use App\Favorite;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Request $request)
{
    Favorite::firstOrCreate([
        'imdb_id' => $request->imdb_id
    ], [
        'title' => $request->title,
        'poster' => $request->poster
    ]);

    return redirect('favorites')->with('success', 'Added to favorite');
}
public function index()
{
    $favorites = Favorite::all();

    return view('favorites.index', compact('favorites'));
}
public function destroy($id)
{
    Favorite::find($id)->delete();

    return back()->with('success', 'Favorite deleted');
}

}
