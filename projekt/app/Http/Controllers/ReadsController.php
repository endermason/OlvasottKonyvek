<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Read;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReadsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Listázza az olvasott könyveket.
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());

        return view("reads", ["reads" => $user->reads]);
    }

    /**
     * Kezdeti view egy új olvasási bejegyzés létrehozásánál.
     */
    public function createStart()
    {
        return view("book.createstart");
    }

    /**
     * Keresés cím alapján egy új olvasási bejegyzés létrehozásánál.
     */
    public function createSearch()
    {
        $title = trim(request()->input('title'));
        if ($title != "") {
            $books = Book::query()->where('title', 'LIKE', "%" . strtolower($title) . "%")->get();
        } else {
            $books = [];
        }

        return view("book.createsearch", ["books" => $books, "title" => $title]);
    }

    /**
     * Egy teljesen új olvasási bejegyzés létrehozása.
     */
    public function createNew()
    {
        $title = trim(request()->input('title'));
        return view("book.createnew", ["title" => $title]);
    }

    /**
     * Egy új olvasási bejegyzés létrehozása (a könyv már létezik).
     */
    public function create()
    {
        $book = Book::find(request()->input('book_id'));
        return view("book.create", ["book" => $book]);
    }

    /**
     * Egy teljesen új olvasási bejegyzés mentése.
     */
    public function storeNew()
    {
        $user = User::findOrFail(Auth::id());
        $errors = [];

        //Author
        if (request()->input('author') == "") {
            $errors[] = "Nem adtál meg szerzőt!";
        } else {
            $authorV = request()->input('author');
        }

        //Title
        if (request()->input('title') == "") {
            $errors[] = "Nem adtál meg címet!";
        } else {
            $titleV = request()->input('title');
        }

        //Year
        if (request()->input('year') == "") {
            $errors[] = "Nem adtál meg kiadási évet!";
        } else if (!is_numeric(request()->input('year'))) {
            $errors[] = "Nem számot adtál meg kiadási évként!";
        } else if (request()->input('year') < 1000 || request()->input('year') > date('Y')) {
            $errors[] = "Nem megfelelő a kiadási év!";
        } else {
            $yearV = request()->input('year');
        }

        //Time
        if (request()->input('time') == "") {
            $errors[] = "Nem adtál meg olvasási dátumot!";
        } else {
            $timeV = request()->input('time');
        }

        if (count($errors) > 0) {
            return view("book.createnew", [
                "author" => request()->input('author'),
                "title" => request()->input('title'),
                "year" => request()->input('year'),
                "time" => request()->input('time'),
                "errors" => $errors]);
        }

        $authors = Author::query()->where('name', '=', $authorV)->get();
        if (count($authors) == 0) {
            $author = new Author();
            $author->name = $authorV;
            $author->save();
        } else {
            $author = $authors[0];
        }

        $book = new Book();
        $book->title = $titleV;
        $book->year = $yearV;
        $author->books()->save($book);

        $reads = new Read();
        $reads->when = $timeV;
        $reads->book_id = $book->id;

        $user->reads()->save($reads);
        return response("")->header('HX-Redirect', route('reads'));
    }

    /**
     * Egy új olvasási bejegyzés mentése.
     */
    public function store()
    {
        $user = User::findOrFail(Auth::id());
        $errors = [];

        //Time
        if (request()->input('time') == "") {
            $errors[] = "Nem adtál meg olvasási dátumot!";
        } else {
            $timeV = request()->input('time');
        }

        //Book
        $book = Book::findOrFail(request()->input('book_id'));

        if (count($errors) > 0) {
            return view("book.create", [
                "time" => request()->input('time'),
                "book" => $book,
                "errors" => $errors]);
        }

        $reads = new Read();
        $reads->when = $timeV;
        $reads->book_id = $book->id;

        $user->reads()->save($reads);
        return response("")->header('HX-Redirect', route('reads'));
    }

    /**
     * Egy olvasási bejegyzés törlése.
     */
    public function delete() {
        $read = Read::findOrFail(request()->input('read_id'));

        //Ha nem a felhasználó olvasta el, hanem másvalaki
        if($read->user_id != Auth::id()) {
            return abort(404);
        }

        //Más nem olvasta el a könyvet?
        if (count($read->book->reads) == 1) {
            //Több könyve van az írónak?
            if (count($read->book->author->books) == 1) {
                $read->book->author->delete();
            }

            $read->book->delete();
        }

        $read->review->delete();
        $read->delete();

        return response("");
    }

}
