<?php

namespace App\Models;
use App\Models\educationDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scholars extends Model
{
    use HasFactory;
    protected $fillable=['fname','lname','mothers_name','birth_date','death_date','photo','birth_place','family','knowledge'];
    public function educationDetail()
      {
        return $this->hasMany(educationDetails::class,'scholars_id');
      }
    public function scholaresInstitute()
      {
        return $this->hasMany(scholarsInstitute::class,'scholars_id');
      }
}
