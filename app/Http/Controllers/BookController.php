<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\BookAuthor;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function booksAll(Request $request){
        \Illuminate\Pagination\Paginator::useBootstrap();

        $bookQuery = Book::query();
        if($request->filled('search')) {
            $search = mb_strtolower($request->input('search'));
            $bookQuery->whereRaw('LOWER(title) LIKE ?', ["%{$search}%"])->get();

        }
        if($request->filled('sort')){
            $sort = strtolower($request->input('sort'));
            $bookQuery->orderBy($sort);
        }
        $booksAll = $bookQuery->paginate(15);
        return view('booksAll',['booksAll'=>$booksAll]);
    }

    public function book_details(Request $request)
    {
        $book_details = Book::where(['id' => $request->id])->get();
        $book_authors = BookAuthor::where(['book_id' => $request->id])->get();
        $authors_id = $book_authors->pluck('author_id')->toArray();
        //        dd($authors_details);
        $authors_details = Author::whereIn('id', $authors_id)->get();



        return view('book_details', ['book_details' => $book_details, "authors_details" => $authors_details]);
    }

    public function bookForm_create(Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|min:4|max:100',
            'description' => 'min:4|max:100',
            'authors' => 'required|array',
            'publication_date' => 'required',
        ]);

        if ($request->image_path) {
            $imageName = time() . '.' . $request->image_path->extension();
            $path_img = $request->image_path->move("./" . 'images', $imageName);
        } else {
            $path_img = "./" . "images/ServiceImages/" . "NotFoundImage.png";
        }

        $bookCreate = Book::create([
            'title' => $valid['title'],
            'description' => $valid['description'] ?? null,
            'image_path' => $path_img ?? null,
            'publication_date' => $valid['publication_date'],
        ]);
        $authors = Author::whereIn('id', $valid['authors'])->get();
        $bookCreate->authors()->attach($authors);

        return redirect()->route('/');
    }
    public function book_delete(Request $request)
    {
        $book = Book::findOrFail($request->id);
        $book->delete();
        return redirect()->route('/')->with('success', 'Книга успешно удалена.');
    }
    public function book_edit(Request $request){
        $valid = $request->validate([
            'title' => 'required|min:4|max:100',
            'description' => 'min:4|max:100',
            'authors' => 'required|array',
            'publication_date' => 'required',

        ]);
        $book = Book::findOrFail($request->bookId);
        if ($request->image_path) {
            $imageName = time() . '.' . $request->image_path->extension();
            $book->image_path =  $request->image_path->move("./" . 'images', $imageName);
        }
        $book->title = $valid['title'];
        $book->description = $valid['description'];
        $book->publication_date = $valid['publication_date'];
        $book->save();
        $authors = Author::whereIn('id', $valid['authors'])->get();
        $book->authors()->sync($authors);

        return redirect()->route('/');
    }

}
