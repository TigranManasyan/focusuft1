<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use App\Models\Form;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $author = Author::find(1);
        $books = $author->books;
        foreach ($books as $book){
            echo $author->name . "<br />";
            echo $book->name . "<hr />";
        }
        echo "<hr />";
        $book = Book::find(2);
        $authors = $book->authors;
        foreach ($authors as $author){
            echo $book->name . "<br />";
            echo $author->name . "<hr />";
        }
        return view('form');
    }

    public function newBook(Request $request)
    {
        $author_name = $_POST['author'];
        $book_name = $_POST['book'];
        $isset_book = DB::select('select * from books where name = ?', [$book_name]);
        if (count($isset_book) === 0){
            DB::insert("INSERT INTO books (name) VALUE (?)", [$book_name]);
            $book_id = DB::getPdo()->lastInsertId();
        }else{
            $book_id = $isset_book[0]->id;
        }
        $isset_author = DB::select('select * from authors where name = ?', [$author_name]);
        if (count($isset_author) === 0){
            DB::insert("INSERT INTO authors (name) VALUE (?)", [$author_name]);
            $author_id = DB::getPdo()->lastInsertId();
        }else{
            $author_id = $isset_author[0]->id;
        }
        DB::insert("INSERT INTO author_book (author_id, book_id) VALUES (?, ?)", [$author_id, $book_id]);
        return redirect()->to('/form')->send();
    }

}
