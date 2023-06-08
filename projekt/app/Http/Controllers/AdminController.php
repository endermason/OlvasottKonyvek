<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);;
    }

    public function __invoke()
    {
        if (auth()->user()->admin != 1) {
            return redirect()->route('dashboard');
        }

        return view('admin');
    }
}
