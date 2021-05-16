<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RoomController extends Controller
{
    public function index (User $user) {
        $receiver_id = $user->id;
        return view('partials.chat', compact('receiver_id'));
    }
}
