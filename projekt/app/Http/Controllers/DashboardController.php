<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        return view('dashboard');
    }

}
