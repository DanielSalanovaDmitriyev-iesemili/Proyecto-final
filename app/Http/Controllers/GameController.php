<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Plataform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Stripe;

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

        $firstGame = Game::where('id', 7)->first();
        $categorias = $firstGame->categories()->get();
        foreach ($categorias as $categoria){
            dump('Yei');
        }
        // return $categorias[0];
        // if(isset($categorias[0])){
        //     return "Vacio";
        // }else{
        //     return "No vacio";
        // }
        // return $firstGame->plataforms()->get();
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

            $game->plataforms()->detach();
            $game->plataforms()->attach(request('plataforms'));
            $game->categories()->detach();
            $game->categories()->attach(request('categories'));

            $game->update($this->validateGame());
            move_uploaded_file($imagenTemporal, $fullImgPath);
            $fp = fopen($fullImgPath, 'r+b');
            fclose($fp);
        }else{
            $game->plataforms()->detach();
            $game->plataforms()->attach(request('plataforms'));
            $game->categories()->detach();
            $game->categories()->attach(request('categories'));

            $game->update($this->validateGame());
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
        $game->delete();
        return redirect()->route('games.admin.list');
    }

    public function gameList ()
    {
        $games = Game::paginate(20);
        return view('layouts.games.list', compact('games'));
    }

    public function validateGame(){
        return request()->validate([
            "name" => "required|max:35",
            "description" => "required|max:150",
            "image" => "file|mimes:jpg,png",
            "pegi" => "required|in:3,7,12,16,18",
            "price" => "required|numeric|min:0.5|max:1000.99",
            "state"=> "required|in:mal,regular,bien,como nuevo",
            "published_at" =>"required|date"
        ]);
    }

    public function payment(){
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51InU3DLE2gDi5g6C6KyJPreWUxEXJmxV90HasKdqgiNo9vrk8TKPmWU3U1x3tBkjeIKCUTJ4zr7Tyq2VR0mS7ewf0031YKoyoq');

		$amount = 100;
		$amount *= 100;
        $amount = (int) $amount;

        //CREAMOS UN CUSTOMER
        $stripe = new \Stripe\StripeClient('sk_test_51InU3DLE2gDi5g6C6KyJPreWUxEXJmxV90HasKdqgiNo9vrk8TKPmWU3U1x3tBkjeIKCUTJ4zr7Tyq2VR0mS7ewf0031YKoyoq');

         $customer = $stripe->customers->create([
            'name' => 'Pedro jose',
            'email' => 'pj00@test.com',
            'description' => 'My First Test Customer (created for API docs)',
          ]);

          //CREAMOS UN PAGO
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
            'customer' => $customer->id,
			'currency' => 'EUR',
			'description' => 'Payment From Codehunger',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

        return view('partials.payment',compact('intent'));
    }

    public function paymentStore(Request $request, $gameId, $userId){
        return 'Pago completo!';
    }
}
