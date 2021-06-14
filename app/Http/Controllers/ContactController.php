<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Session;
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
        Session::flash('success', 'Correo enviado correctamente');
        return redirect()->route("mail.index");
    }

    public function validateContact()
    {
        return request()->validate([
            'name' => 'required|max:35',
            'surname' => 'required|max:50',
            'email' => 'required|max:50',
            'issue' => 'required',
            'message' => 'required'
        ]);
    }
}
