<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index ( ){
        return view('partials.mail');
    }
    public function store()
    {
        $contact = new Contact($this->validateContact());
        $contact->save();
        $email = request()->email;
        $name = request()->name;
        $surname = request()->surname;
        $subject = request()->issue;
        $text = request()->message;

        $data = array('name'=>$name, 'surname'=>$surname, 'subject'=>$subject,'text'=> $text);
        Mail::send('mail', $data, function($message) use ($subject, $name, $surname, $email) {
        $message->to('app@laravelblog.com', 'App')
        ->subject($subject);
        $message->from($email, $name . ' ' .$surname);
            });
        return redirect()->route("mail.index");
    }

    public function validateContact()
    {
        return request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'issue' => 'required',
            'message' => 'required'
        ]);
    }
}
