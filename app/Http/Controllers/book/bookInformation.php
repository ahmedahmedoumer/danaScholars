<?php

namespace App\Http\Controllers\book;

use App\Http\Controllers\Controller;
use App\Models\books;
use Illuminate\Http\Request;
use illuminate\support\Facades\Storage;

class bookInformation extends Controller
{
    //
    public function getBookInformation(Request $request)
    {
        $scholarsId=$request->query('scholarsId');
        $books=books::with('booksCategory')->where('author',$scholarsId)->get();
        return $books  ? response()->json($books,200)
                       : response()->json($books,400);
    }
    public function downloadBooks($fileName)
    {
      $filePath='sourceFile/'.$fileName;
      return Storage::exists($filePath) ? Storage::download($filePath,$fileName)
                                        : response()->json('fileNotFound',404);
    }
    public function getAllBooks()
    {
        $books=books::all();
        return response()->json($books,200);
    }
    public function getBookDetail(Request $request)
    {
      $bookId=$request->query('bookId');
      $findBook=books::with('booksCategory')->where('id',$bookId)->first();
      return $findBook  ? response()->json($findBook,200)
                        : response()->json($findBook,400);

    }
}   
