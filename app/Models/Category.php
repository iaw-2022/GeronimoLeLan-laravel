<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
    ];
    public function games(){
      return $this->belongsToMany('App\Models\Game');
    }
    public function runs(){
       return $this->belongsToMany('App\Models\Run');
   }
}

