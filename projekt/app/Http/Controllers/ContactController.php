<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    /**
     * Kapcsolat oldal.
     */
    public function __invoke()
    {
        return view("contact");
    }

    /**
     * Kapcsolat oldalról küldött üzenet feldolgozása.
     */
    public function send()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Mail::to("theendermason@gmail.com")->send(new ContactMail($data));

        //redirect back with success message
        return redirect()->back()->with('success', 'Üzenet elküldve!');
    }

}
