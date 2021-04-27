<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Plataform;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\GmpCaster;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $plataforms = Plataform::all();
        $games = Game::paginate(5);

        return view('partials.games', compact('games', 'plataforms', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function filter (Request $request, Game $game) {
        $game = $game->newQuery();

         if(!$request->plataform == null) {
            $game->whereHas('plataforms', function ($query) use ($request){
             $query->where('name', $request->plataform);

         });}

         if(!$request->genre == null) {
             $game->whereHas('categories', function ($query) use ($request){
             $query->where('name', $request->genre);

          });}

        if(!$request->iniPrice == null && !$request->endPrice == null) {
            $game->where('price', '>=',  $request->iniPrice);
            $game->where('price', '<=', $request->endPrice);
         }

        if(!$request->state == null) {
            $game->where('state',$request->state);
        }

        if(!$request->title == null) {
            $game->where('name','LIKE', '%' . $request->title . '%');
        }
        $plataforms = Plataform::all();
        $categories = Category::all();
        $games = $game->paginate(5);

        return view('partials.games', compact('games', 'plataforms', 'categories'));
     }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $plataforms = Plataform::all();
        $categories = Category::all();
        return view('partials.game-detail', compact('game', 'plataforms', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.admin.list');
    }

    public function gameList ()
    {
        $games = Game::paginate(20);
        return view('layouts.games.list', compact('games'));
    }
}
