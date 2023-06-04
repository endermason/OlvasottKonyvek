<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Postmark\PostmarkClient;

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

        //send email based on data
        /*Mail::raw($data['message'], function ($message) use ($data) {

            //$message->from($data['email'], $data['name']);
            $message->from('szabo.bence.12@hallgato.sze.hu', 'Szabó Bence');

            $message->to('szabo.bence.12@hallgato.sze.hu');

            $message->subject($data['subject']);

        });*/

        $client = new PostmarkClient("45ff2383-d72e-42ff-b44e-f3eda80a6097");

        // Send an email:
        $sendResult = $client->sendEmail(
            "szabo.bence.12@hallgato.sze.hu",
            "szabo.bence.12@hallgato.sze.hu",
            $data['subject'],
            null,
            $data['email'] . ": " . $data['name'] . "\n\n" . $data['message'],
            null,
            null,
            $data['email'],
        );

        //redirect back with success message
        return redirect()->back()->with('success', 'Üzenet elküldve!');
    }

}
