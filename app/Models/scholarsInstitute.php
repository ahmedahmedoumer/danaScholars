<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scholarsInstitute extends Model
{
    use HasFactory;

    public function institute()
      {
        return $this->belongsTo(institution::class,'institutions_id');
      }
      public function scholars()
      {
        return $this->belongsTo(scholars::class);
      }
}
