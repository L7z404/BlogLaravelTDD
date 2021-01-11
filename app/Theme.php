<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// $user->$themes
class Theme extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function articles(){
        return $this->hasMany(Article::class);
    }
    
}
