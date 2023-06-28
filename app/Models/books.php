<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;
    
    public function booksCategory()
      {
        return $this->belongsTo(bookCategory::class,'book_category_id');
      }
}
