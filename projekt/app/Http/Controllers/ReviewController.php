<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Read;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function createReview($id)
    {
        $read = Read::findOrFail($id);

        return view("review.create", ["read" => $read]);
    }
}
