<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\users;
use App\Models\scholars;
class books extends Model
{
    use HasFactory;
    
    public function booksCategory()
      {
        return $this->belongsTo(bookCategory::class,'book_category_id');
      }
      public function AuthorName(){
        return $this->belongsTo(scholars::class,'author');
      }
}
