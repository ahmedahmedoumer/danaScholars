<?php

namespace App\Http\Controllers\book;

use App\Http\Controllers\Controller;
use App\Models\books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class bookInformation extends Controller
{
    //
    public function getBookInformation(Request $request)
    {
        $scholarsId=$request->query('scholarsId');
        $books=books::with('booksCategory')->where('author',$scholarsId)->get();
        return $books  ? response()->json($books,200)
                       : response()->json(null,400);
    }
    public function downloadBooks($fileName)
    {
      $filePath='public/books/'.$fileName;
      return Storage::exists($filePath) ? Storage::download($filePath,$fileName)
                                        : abort(404);
    }
    public function getAllBooks(Request $request)
    {
        $page=$request->query('page');
        $perPage=$request->query('perPage');
        $books=books::paginate(page:$page,perPage:$perPage);
        return response()->json($books,200);
    }
    public function getBookDetail(Request $request)
    {
      $bookId=$request->query('bookId');
      $findBook=books::with('booksCategory','AuthorName')->where('id',$bookId)->first();
      return $findBook  ? response()->json($findBook,200)
                        : response()->json($findBook,400);
    }
    public function randomBooksSelector(){
        return response()->json(books::all()->random(5), 200);
        
    }
}   
