<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\institution;
use App\Models\awards;

class instituteAwards extends Model
{
    use HasFactory;
    protected $fillable=['awards_id','institutions_id','description','created_at'];
    public function institutionName()
    {
        return $this->belongsTo(institution::class,'institutions_id');
    }
    public function awardsName()
    {
        return $this->belongsTo(awards::class,'awards_id');
    }
}
