<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()) {
            return redirect(route('dashboard'));
        } else {
            return view('welcome');
        }
    }
}
