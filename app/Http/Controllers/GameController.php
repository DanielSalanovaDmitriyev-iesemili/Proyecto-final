<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Plataform;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;

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
        $games = Game::paginate(6);

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
            $game->filterPlataform($request->plataform);
        }

        if(!$request->genre == null) {
            $game->filterGenre($request->genre);
        }

        if(!$request->iniPrice == null && !$request->endPrice == null) {
            $game->where('price', '>=',  $request->iniPrice);
            $game->where('price', '<=', $request->endPrice);
         }

        if(!$request->state == null) {
            $game->filterState($request->state);
        }

        if(!$request->title == null) {
            $game->filterName($request->title);
        }
        $plataforms = Plataform::all();
        $categories = Category::all();
        $games = $game->paginate(6);

        return view('partials.games', compact('games', 'plataforms', 'categories'));
     }

    public function create()
    {
        if(Auth::user()->rol_id != 1) {
            return redirect()->route('games.index');
        }
        $plataforms = Plataform::all();
        $categories = Category::all();
        return view("layouts.games.create", compact("plataforms", "categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->rol_id != 1) {
            return redirect()->route('games.index');
        }
        $validator = Validator::make(
            ['image' => $_FILES["image"]["name"]],
            ['image' => 'max:35']);
        if ( $validator->fails() )
        {
            return Redirect::back()->withErrors($validator);
        }

        $imagenTemporal = $_FILES["image"]["tmp_name"];
        $fullImgPath ="img/".$_FILES["image"]["name"];

        $game = new Game($this->validateGame());
        $game->img = $fullImgPath;
        $game->save();
        $game->plataforms()->attach(request('plataforms'));
        $game->categories()->attach(request('categories'));
        move_uploaded_file($imagenTemporal, $fullImgPath);
        $fp = fopen($fullImgPath, 'r+b');
        fclose($fp);
        return redirect()->route('games.admin.list');
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
        $comments = $game->comments()->orderBy('created_at', 'desc')->get();
        return view('partials.game-detail', compact('game', 'plataforms', 'categories', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        if(Auth::user()->rol_id != 1) {
            return redirect()->route('games.index');
        }
        $plataforms = Plataform::all();
        $categories = Category::all();
        return view("layouts.games.edit", compact("plataforms", "categories", "game"));
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
        if(Auth::user()->rol_id != 1) {
            return redirect()->route('games.index');
        }
        if(!$_FILES["image"]["name"] == null){
            $validator = Validator::make(
                ['image' => $_FILES["image"]["name"]],
                ['image' => 'max:35']);
            if ( $validator->fails() )
            {
                return Redirect::back()->withErrors($validator);
            }

            $imagenTemporal = $_FILES["image"]["tmp_name"];
            $fullImgPath ="img/".$_FILES["image"]["name"];

            $game->img = $fullImgPath;

           $this->addPlataformsCategoriesAndValidate($game);

            move_uploaded_file($imagenTemporal, $fullImgPath);
            $fp = fopen($fullImgPath, 'r+b');
            fclose($fp);
        }else{
            $this->addPlataformsCategoriesAndValidate($game);
        }
        return redirect()->route('games.admin.list');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        if(Auth::user()->rol_id != 1) {
            return redirect()->route('games.index');
        }
        $game->delete();
        return redirect()->route('games.admin.list');
    }

    public function gameList ()
    {

        if(Auth::user()->rol_id != 1) {
            return redirect()->route('games.index');
        }
        $games = Game::paginate(20);
        return view('layouts.games.list', compact('games'));
    }

    public function categoryFilter(Category $category)
    {
        $games = Category::where('id', $category->id)->first()->games()->paginate(6);
        $categories = Category::all();
        $plataforms = Plataform::all();

        return view('partials.games', compact('games', 'plataforms', 'categories'));
    }

    public function plataformFilter(Plataform $plataform)
    {
        $games = Plataform::where('id', $plataform->id)->first()->games()->paginate(6);
        $categories = Category::all();
        $plataforms = Plataform::all();

        return view('partials.games', compact('games', 'plataforms', 'categories'));
    }

    public function validateGame(){
        return request()->validate([
            "name" => "required|max:35",
            "description:es" => "required|max:150",
            "description:en" => "required|max:150",
            "image" => "file|mimes:jpg,png",
            "pegi" => "required|in:3,7,12,16,18",
            "price" => "required|numeric|min:0.5|max:1000.99",
            "state"=> "required|in:mal,regular,bien,como nuevo",
            "published_at" =>"required|date"
        ]);
    }
    function addPlataformsCategoriesAndValidate(Game $game){
        $game->plataforms()->detach();
        $game->plataforms()->attach(request('plataforms'));
        $game->categories()->detach();
        $game->categories()->attach(request('categories'));
        $game->update($this->validateGame());
    }

    function admin() {
        if(Auth::user()->rol_id != 1) {
            return redirect()->route('games.index');
        }
    }


}
