<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;


class RoomController extends Controller
{
    public function index (User $user) {
        $receiver_id = $user->id;
        return view('partials.chat', compact('receiver_id'));
    }

    public function list ( ){

        if(Auth::user()->rol_id == 3) {
            $users = Room::first()->users()->wherePivot('receiver_id', Auth::user()->id)->distinct('user_id')->pluck('user_id');
            return view('partials.chat-list', compact('users'));
        }else{
            $users = Room::first()->users()->wherePivot('receiver_id',Auth::user()->id)->orWhere('receiver_id',Auth::user()->id)->distinct('user_id')->pluck('user_id');
            return view('partials.chat-list',compact('users'));
        }

    }
}
