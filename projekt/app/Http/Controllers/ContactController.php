<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{

    /**
     * Kapcsolat oldal.
     */
    public function __invoke()
    {
        return view("contact");
    }

}
