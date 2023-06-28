<?php

namespace App\Models;
use App\Models\educationDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scholars extends Model
{
    use HasFactory;
    public function educationDetail()
    {
        return $this->hasOne(educationDetails::class);
    }
}
