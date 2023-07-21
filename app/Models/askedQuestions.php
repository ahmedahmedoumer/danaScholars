<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class askedQuestions extends Model
{
    use HasFactory;
    protected $fillable=['asked_questions','answers','description'];
}
