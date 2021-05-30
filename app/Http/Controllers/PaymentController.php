<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Game;
use App\Models\User;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    public function payment(Game $game){
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

		$amount = $game->price;
		$amount *= 100;
        $amount = (int) $amount;

        //CREAMOS UN PAGO
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Intento de pago de ' . $game->name,
			'amount' => $amount,
            'customer' => Auth::user()->stripe_id,
			'currency' => 'EUR',
			'description' => 'Payment From Codehunger',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

        return view('partials.payment', compact('intent', 'game'));
    }

    public function paymentStore(Request $request, Game $game, User $user){
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET_KEY')
          );
        if(Auth::user()->card_id == null){
            $card = $stripe->customers->createSource(
                    Auth::user()->stripe_id,
                    ['source' => $request->stripeToken]
             );

             $user->card_id = $card->id;
             $user->update();

             $cardId = $card->id;
        }else{
            $cardId = Auth::user()->card_id;
        }

        $amount = $game->price;
		$amount *= 100;
        $amount = (int) $amount;

        $charge = Charge::create(array(
            'customer' => Auth::user()->stripe_id,
            'amount' => $amount,
            'source' => $cardId,
            'description' => 'Compra de ' . $game->name,
            'currency' => 'EUR'
        ));
        $game->users()->attach(Auth::user()->id,['invoice' => $charge->id, 'amount'=> $game->price, 'currency' => $charge->currency]);
        return redirect()->route('games.index')->with('payment', 'Pago completado!');
    }
}
