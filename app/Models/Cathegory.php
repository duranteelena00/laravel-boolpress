<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cathegory extends Model
{
    protected $fillable = ['name', 'slug', 'color'];

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
}
