<?php

namespace App\Http\Controllers;

use App\Models\Review;

class BrowsingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $search = trim(request()->input('search'));
        $reviews = Review::query()->join('reads', 'reviews.read_id', "=", 'reads.id')
            ->join('books', 'reads.book_id', '=', 'books.id')
            ->where('books.title', 'LIKE', "%" . mb_strtolower($search) . "%")
            ->where('reviews.public', '=', 1)->get(['reviews.title as review_title', '*']);
        $size = ceil($reviews->count() / 2);

        //Lekérdezés eredményének átadása a sessionbe.
        request()->session()->flash('reviews', $reviews);
        request()->session()->flash('size', $size);

        return view('browsing.index', ['reviews' => $reviews->take(2), 'size' => $size, 'page' => 1, 'search' => $search]);
    }

    public function load($page)
    {
        //Sessionben lévő adatok megőrzése.
        request()->session()->reflash();

        //Sessionben lévő adatok lekérése.
        $size = intval(request()->session()->get('size'));
        $search = trim(request()->session()->get('search'));
        $reviews = request()->session()->get('reviews')->skip(($page - 1) * 2)->take(2);

        return view('browsing.load', ['reviews' => $reviews, 'size' => $size, 'page' => $page, 'search' => $search]);
    }

}
