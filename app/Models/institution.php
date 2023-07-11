<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class institution extends Model
{
    use HasFactory;

    public function institutionAward()
    {
        return $this->hasMany(instituteAwards::class);
    }
    public function instituteStudents()
    {
        return $this->hasMany(scholarsInstitute::class,'institutions_id')->where('relation_title','student');
    }
    public function institutionAwards()
    {
        return $this->hasMany(instituteAwards::class,'institutions_id');
    }
    public function scholars()
    {
        return $this->hasMany(scholars::class,'scholars_id');
    }
}
