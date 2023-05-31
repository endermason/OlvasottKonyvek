<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Review;

class BrowsingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $authors = Author::all();
        $selected_authors = array();
        for ($i = 0; $i < count($authors); $i++) {
            if (request()->input($i, "0") != "0") {
                $selected_authors[] = request()->input($i);
            }
        }

        $stars = request()->input('stars', 0);

        $order = request()->input('order', 0);

        $search = trim(request()->input('search'));
        $reviews = Review::query()->join('reads', 'reviews.read_id', "=", 'reads.id')
            ->join('books', 'reads.book_id', '=', 'books.id')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->when($selected_authors, function ($query, $selected_authors) {
                $query->whereIn('authors.name', $selected_authors);
            })
            ->when($stars, function ($query, $stars) {
                $query->where('reviews.rating', '=', $stars);
            })
            ->where('books.title', 'LIKE', "%" . mb_strtolower($search) . "%")
            ->where('reviews.public', '=', 1)
            ->when($order, function ($query, $order) {
                if ($order == "tasc") {
                    $query->orderBy('books.title', 'asc');
                } else if ($order == "tdsc") {
                    $query->orderBy('books.title', 'desc');
                } else if ($order == "rasc") {
                    $query->orderBy('reviews.rating', 'asc');
                } else if ($order == "rdsc") {
                    $query->orderBy('reviews.rating', 'desc');
                } else if ($order == "dasc") {
                    $query->orderBy('reviews.created_at', 'asc');
                } else if ($order == "ddsc") {
                    $query->orderBy('reviews.created_at', 'desc');
                }
            })
            ->get(['reviews.title as review_title', 'reviews.created_at as review_date', '*']);
        $size = ceil($reviews->count() / 2);

        //Lekérdezés eredményének átadása a sessionbe.
        request()->session()->flash('reviews', $reviews);
        request()->session()->flash('size', $size);

        return view('browsing.index', ['reviews' => $reviews->take(2), 'size' => $size, 'page' => 1, 'search' => $search, 'authors' => $authors, 'selected_authors' => $selected_authors]);
    }

    public function load($page)
    {
        //Sessionben lévő adatok megőrzése.
        request()->session()->reflash();

        //Sessionben lévő adatok lekérése.
        $size = intval(request()->session()->get('size'));
        $reviews = request()->session()->get('reviews')->skip(($page - 1) * 2)->take(2);

        return view('browsing.load', ['reviews' => $reviews, 'size' => $size, 'page' => $page]);
    }

}
