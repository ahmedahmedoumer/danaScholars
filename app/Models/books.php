<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\users;
use App\Models\booksCategory;
use App\Models\scholars;
class books extends Model
{
    use HasFactory;
    protected $fillable=['book_name','description','sourceFile','written_on','img','book_category_id','author'];
    public function booksCategory()
      {
        return $this->belongsTo(bookCategory::class,'book_category_id');
      }
      public function AuthorName(){
        return $this->belongsTo(scholars::class,'author');
      }
      public function getImgAttribute($value)
      {
        return $value ? env('APP_URL').$value : null;
      }
      public function getPhotoAttribute($value)
      {
        return $value ? env('APP_URL').$value : null;
      }

}
