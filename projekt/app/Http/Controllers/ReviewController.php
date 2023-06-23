<?php

namespace App\Http\Controllers;

use App\Models\Read;
use App\Models\Review;

class ReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);;
    }


    public function createReview($id)
    {
        $read = Read::findOrFail($id);

        //Ha nem az övé.
        if ($read->user_id != auth()->id()) {
            abort(403);
        }

        return view("review.create", ["read" => $read, "edit" => false]);
    }

    public function store()
    {
        $read = Read::findOrFail(request()->input('read_id'));

        //Ha nem az övé.
        if ($read->user_id != auth()->id()) {
            abort(403);
        }

        $errors = [];

        $title = trim(request()->input('title'));

        if (request()->input('rating') == "") {
            $errors[] = "Az értékelés megadása kötelező!";
        } else if (!is_numeric(request()->input('rating'))) {
            $errors[] = "Nem számot adtál meg értékelésként!";
        } else if (request()->input('rating') < 1 || request()->input('rating') > 5) {
            $errors[] = "Az értékelés 1 és 5 közötti szám lehet!";
        } else {
            $rating = request()->input('rating');
        }

        if (request()->input('review') == "") {
            $errors[] = "A vélemény megadása kötelező!";
        } else {
            $reviewV = request()->input('review');
        }

        if (request()->input('public', "off") == "on") {
            $public = 1;
        } else {
            $public = 0;
        }

        if (count($errors) > 0) {
            return view("review", [
                "read" => $read,
                "title" => request()->input('title'),
                "rating" => request()->input('rating'),
                "review" => request()->input('review'),
                "public" => request()->input('public', "off") == "on",
                "errors" => $errors]);
        }

        $review = new Review();
        $review->title = $title;
        $review->rating = $rating;
        $review->review = $reviewV;
        $review->read_id = $read->id;
        $review->public = $public;
        $review->save();

        return response("")->header('HX-Redirect', route('reads'));
    }


    public function editReview($id)
    {
        $review = Review::findOrFail($id);

        //Ha nem az övé.
        if ($review->read->user_id != auth()->id()) {
            abort(403);
        }

        return view("review", [
            "read" => $review->read,
            "id" => $review->id,
            "title" => $review->title,
            "rating" => $review->rating,
            "review" => $review->review,
            "public" => $review->public,
            "edit" => true,
        ]);
    }

    public function edit() {
        $read = Read::findOrFail(request()->input('read_id'));

        //Ha nem az övé.
        if ($read->user_id != auth()->id()) {
            abort(403);
        }

        if (request()->input('delete', "") != "") {
            $review = Review::findOrFail($read->review->id);
            $review->delete();
            return response("")->header('HX-Redirect', route('reads'));
        }

        $errors = [];

        $title = trim(request()->input('title'));

        if (request()->input('rating') == "") {
            $errors[] = "Az értékelés megadása kötelező!";
        } else if (!is_numeric(request()->input('rating'))) {
            $errors[] = "Nem számot adtál meg értékelésként!";
        } else if (request()->input('rating') < 1 || request()->input('rating') > 5) {
            $errors[] = "Az értékelés 1 és 5 közötti szám lehet!";
        } else {
            $rating = request()->input('rating');
        }

        if (request()->input('review') == "") {
            $errors[] = "A vélemény megadása kötelező!";
        } else {
            $reviewV = request()->input('review');
        }

        if (request()->input('public', "off") == "on") {
            $public = 1;
        } else {
            $public = 0;
        }

        if (count($errors) > 0) {
            return view("review.edit", [
                "read" => $read,
                "title" => request()->input('title'),
                "rating" => request()->input('rating'),
                "review" => request()->input('review'),
                "public" => request()->input('public', "off") == "on",
                "errors" => $errors]);
        }

        $review = Review::findOrFail($read->review->id);
        $review->title = $title;
        $review->rating = $rating;
        $review->review = $reviewV;
        $review->public = $public;
        $review->save();

        return response("")->header('HX-Redirect', route('reads'));
    }

    public function delete() {
        $review = Review::findOrFail(request()->input('review_id'));

        //Ha nem az övé.
        if ($review->read->user_id != auth()->id()) {
            abort(403);
        }

        $review->delete();
        return response("")->header('HX-Redirect', route('reads'));
    }

}
