<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function authorsAll(Request $request)
    {
        \Illuminate\Pagination\Paginator::useBootstrap();
        $authorQuery = Author::query();
        if ($request->filled('search')) {
            $search = strtolower($request->input('search'));
            $authorQuery->where('last_name', 'LIKE', "%$search%")->orWhere('first_name', 'LIKE', "%$search%");;
        }
        if ($request->filled('sort')) {
            $sort = strtolower($request->input('sort'));
            $authorQuery->orderBy($sort);
        }
        $authorsAll = $authorQuery->paginate(15);
        return view('authorsAll', ['authorsAll' => $authorsAll]);
    }
    public function authorForm_create(Request $request){
        $valid = $request->validate([
            'first_name' => 'required|min:3|max:25',
            'last_name' => 'required|min:3|max:25'
        ]);
        if (!$valid) {
            return redirect()->route('authorsAll')->withErrors();
        }

        $author = new Author();
        $author->first_name = $request->input('first_name');
        $author->last_name = $request->input('last_name');
        $author->middle_name = $request->input('middle_name');
        $author->save();
        return redirect()->route('authorsAll')->withErrors("success","Автор создан");
     }

    public function author_details(Request $request){
        $authors = Author::where(['id' => $request->id])->get();
        $book_authors = BookAuthor::where(['author_id' => $request->id])->get();
        $book_id = $book_authors->pluck('book_id')->toArray();
        $book_details = Book::whereIn('id', $book_id)->get();

        return view('author_details',['authors'=>$authors,'book_details'=>$book_details]);
    }
    public function author_delete(Request $request){
        $author = Author::findOrFail($request->id);
        $book_authors = BookAuthor::where(['author_id'=>$request->id])->get();
        if (count($book_authors)>=1) {
            return redirect()->route('author_details',['id'=>$request->id])
                ->withErrors("Удалите книги этого автора")
                ->withInput();
        }
        $author->delete();
        return redirect()->route('authorsAll')->with('success', 'Автор успешно удален.');
    }
    public function author_edit(Request $request)
    {
        $valid = $request->validate([
            'first_name' => 'required|min:3|max:25',
            'last_name' => 'required|min:3|max:25'
        ]);
        $author = Author::findOrFail($request->authorId);

        $author->first_name = $valid['first_name'];
        $author->last_name = $valid['last_name'];
        if($request->middle_name){
            $author->middle_name = $request->middle_name;
        }
        $author->save();
        return redirect()->route('author_details',['id'=>$request->authorId]);
    }
}
