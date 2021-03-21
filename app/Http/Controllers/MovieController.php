<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function getAllMovies() {
        $movie = Movie::all();
        return response()->json($movie,200);
    }

    public function getJoinMovies() {
       $movie = Movie::select('movies.*','categories.*')->join('categories','categories.id','=','movies.category_id')->get();
       if($movie->isEmpty()) {
           return response()->json(['Message' => 'Not found'],404);
       }
       return response()->json($movie,200);
    }

    public function getJoinMoviexId($id) {
        $movie = Movie::select('movies.*','categories.*')->where('movies.id',$id)->join('categories','categories.id','=','movies.category_id')->get();
        if($movie->isEmpty()) {
            return response()->json(['Message' => 'Not found'],404);
        }
        return response()->json($movie,200);
    }
    public function createMovie(Request $request) {
        $movie = Movie::create($request->all());
        return response()->json($movie,200);
    }

    public function updateMovie(Request $request, $id) {
        $movie = Movie::find($id);
        if(is_null($movie)){
            return response()->json(['Message' => 'Not found'],404);

        }
        $movie->update($request->all());
        return response()->json($movie,200);
    }

    public function deleteMovie($id) {
        $movie = Movie::find($id);
        if(is_null($movie)){
            return response()->json(['Message' => 'Not found'],404);

        }
        $movie->delete();
        return response()->json(['Message' => 'Data deleted successfully'],200);
    }

}
