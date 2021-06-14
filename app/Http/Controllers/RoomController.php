<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;


class RoomController extends Controller
{
    public function index ($id) {
        // return $user;

        $user = User::where('id', $id)->first();
        $receiver_id = $user->id;
        return view('partials.chat', compact('receiver_id'));
    }

    public function list (){

        if(Auth::user()->rol_id == 3) {
            $users = Room::first()->users()->wherePivot('receiver_id', Auth::user()->id)->distinct('user_id')->pluck('user_id');
            return view('partials.chat-list', compact('users'));
        }else{
            // $users = Room::first()->users()->wherePivot('receiver_id',Auth::user()->id)->orWhere('receiver_id',Auth::user()->id)->distinct('user_id')->pluck('user_id');
            // foreach ($users as $user){
            //     return view('partials.chat-list',compact('users'));
            // }
            $adminChat = User::where('rol_id', 3)->first();
            $users = $adminChat->id;
            return view('partials.chat-list',compact('users'));
        }

    }
}
