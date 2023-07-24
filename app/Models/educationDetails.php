<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\educationCategories;

class educationDetails extends Model
{
    use HasFactory;
    public function educationCategories()
    {
        return $this->belongsTo(educationCategories::class,'education_categories_id');
    }
    public function scholarsInstitute()
    {
        return $this->belongsTo(scholarsInstitute::class,'institutions_id');
    }
    public function scholars()
    {
        return $this->belongsTo(scholars::class);
    }
    public function institution()
    {
        return $this->belongsTo(institution::class,'institutions_id');
    }
    
}