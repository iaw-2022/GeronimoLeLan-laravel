<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];
    public function runs(){
        return $this->hasMany(Run::class,'id');
    }
    public function categories(){
       // return $this->belongsToMany(Category::class,'game_category');
        return $this->belongsToMany('App\Models\Category');
    }
}
