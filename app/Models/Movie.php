<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
   public $timestamps = false;
   protected $fillable = ['id','name','description','release_date','category_id'];

   public function movies() {
       return $this->belongsTo('App\Models\Category','category_id');
   }
}
