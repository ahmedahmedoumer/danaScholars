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
        return $this->belongsTo(educationCategories::class);
    }
    public function scholarsInstitute()
    {
        return $this->belongsTo(scholarsInstitute::class,'institutions_id');
    }
    
}
