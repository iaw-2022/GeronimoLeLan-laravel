<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Run extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'name',
        'description',
        'validation',
        'positive_votes',
        'negative_votes',
        'id_game',
        'id_user'
    ];

    public function games(){    
        return $this->belongsTo(Game::class,'id_game');
    }

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
    public function categories(){
         return $this->belongsToMany('App\Models\Category');
     }
}
