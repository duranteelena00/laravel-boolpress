<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title', 'content', 'slug', 'image', 'cathegory_id'];

    public function getFormattedDate($column, $format = 'd/m/Y H:i'){
        return Carbon::create($this->$column)->format($format);
    }

    public function cathegory(){
        return $this->belongsTo('App\Models\Cathegory');
    }

    public function author(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
};


